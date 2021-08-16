<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Cupon;
use App\User;
use App\Product;
use App\Category;
use App\Exports\CuponsExport;
use App\Imports\CuponsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has("lista") && $request->input("lista") == "eliminados"){
            $cupons = Cupon::onlyTrashed()->get();
        }else{
            $cupons = Cupon::all();
        }

        return view('backend.cupons.index')->with([
            'cupons' => $cupons,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'zone' => 'required',
            'criterion' => 'required',
            'elements' => 'required',
            'maximum_uses' => 'required|numeric',
            'time_alive' => 'required|string',
            'value' => 'required|numeric',
            'active' => 'boolean',
        ]);

        $cupon = Cupon::create($request->all());

        //Crea una collection eliminando elementos vacios y reordenando indicces para que queden consecutivos
        $elements = collect();
        foreach (collect($request->elements)->whereNotNull() as $key => $value) {
            $elements->push($value);
        }

        //Agrupa todos los datos necesarios para crear una conditions del cupon
        $conditions = [];
        foreach ($request->zone as $key => $value) {
            $conditions[] = [
                'zone' => $value,
                'criterion' => $request->criterion[$key],
                'elements' => $elements->get($key),
            ];
        }

        $cupon->conditions = json_encode($conditions);
        $cupon->save();

        session()->flash('status','El cupon se creo con exito');
        
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function show(Cupon $cupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Cupon $cupon)
    {
        return view('backend.cupons.edit')->with([
            'cupon' => $cupon,
            'products' => Product::all(),
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cupon $cupon)
    {
        $request->validate([
            'name' => 'required|max:50',
            'zone' => 'required',
            'criterion' => 'required',
            'elements' => 'required',
            'maximum_uses' => 'required|numeric',
            'time_alive' => 'required|string',
            'value' => 'required|numeric',
            'active' => 'boolean',
        ]);

        $cupon->update($request->except(['zone','criterion','elements']));

        //Crea una collection eliminando elementos vacios y reordenando indicces para que queden consecutivos
        $elements = collect();
        foreach (collect($request->elements)->whereNotNull() as $key => $value) {
            $elements->push($value);
        }

        $conditions = [];
        foreach ($request->zone as $key => $value) {
            $conditions[] = [
                'zone' => $value,
                'criterion' => $request->criterion[$key],
                'elements' => $elements->get($key),
            ];
        }

        $cupon->conditions = json_encode($conditions);
        $cupon->save();

        session()->flash('status','El cupon se actualizo con exito');
        
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(request()->has('eliminar')){
            Cupon::withTrashed()->where('id', $id)->first()->forceDelete();
        }else{
            Cupon::withTrashed()->where('id', $id)->first()->delete();
        }
        
        return redirect()->route('cupons.index')->with('status','Cupon eliminado correctamente');
    }

    public function searchElement(Request $request){
        $elementsArray = [];
        switch($request->element){
            case 'products':
                foreach (Product::all() as $objt) {
                    $elementsArray[$objt->id] = $objt->name;
                }
                break;
            case 'categories':
                foreach (Category::all() as $objt) {
                    $elementsArray[$objt->id] = $objt->name;
                }
                break;
            case 'users':
                foreach (User::all() as $objt) {
                    $elementsArray[$objt->id] = $objt->name;
                }
                break;
        }
        return json_encode($elementsArray);
    }

    public function exportImport(){
        return view('backend.cupons.export-import');
    }

    public function export(){
        
        return Excel::download(new CuponsExport, 'cupons-list.xlsx');

    }

    public function import(Request $request){
        $request->validate([
            'excel-file' => 'required|mimes:xlsx,xls',
        ]);
        
        Excel::import(new CuponsImport, $request->file('excel-file'));

        session()->flash('status','La importación fue exitosa');

        return redirect()->back();
    }

}

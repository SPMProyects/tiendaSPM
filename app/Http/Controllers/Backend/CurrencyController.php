<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Currency;
use App\Exports\CurrenciesExport;
use App\Imports\CurrencyImport;
use Maatwebsite\Excel\Facades\Excel;


class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has("lista") && $request->input("lista") == "eliminados"){
            $currencies = Currency::onlyTrashed()->get();
        }else{
            $currencies = Currency::all();
        }

        return view('backend.currencies.index')->with([
            'currencies' => $currencies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.currencies.create');
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
            'value' => 'required|numeric|min:0.001',
        ]);

        Currency::create($request->all());

        session()->flash('status','La moneda se creo con exito');

        return view('backend.currencies.index')->with(['currencies' => Currency::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.currencies.edit')->with(['currency' => Currency::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'value' => 'required|numeric|min:0.001',
        ]);

        Currency::findOrFail($id)->update($request->all());
        
        session()->flash('status','La moneda se edito con exito');
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(request()->has('eliminar')){
            Currency::withTrashed()->where('id', $id)->first()->forceDelete();
        }else{
            Currency::withTrashed()->where('id', $id)->first()->delete();
        }
        
        return redirect()->route('currencies.index')->with('status','Moneda eliminada correctamente');
    }

    public function exportImport(){
        return view('backend.currencies.export-import');
    }

    public function export(){
        
        return Excel::download(new CurrenciesExport, 'currencies-list.xlsx');

    }

    public function import(Request $request){

        $request->validate([
            'excel-file' => 'required|mimes:xlsx,xls',
        ]);
        
        Excel::import(new CurrencyImport, $request->file('excel-file'));

        session()->flash('status','La importación fue exitosa');

        return redirect()->back();
    }
    
}
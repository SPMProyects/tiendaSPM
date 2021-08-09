<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Exports\CategoriesExport;
use App\Imports\CategoryImport;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has("lista") && $request->input("lista") == "eliminados"){
            $categories = Category::onlyTrashed()->get();
        }else{
            $categories = Category::all();
        }

        return view('backend.categories.index')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create')->with([
            'categories' => Category::all(),
        ]);
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
            'description' => 'sometimes|string|max:250',
            'parent_id' => 'sometimes|nullable|integer',
        ]);

        Category::create($request->all());

        session()->flash('status','La categoria se creo con exito');

        return view('backend.currencies.index')->with(['currencies' => Category::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('backend.categories.edit')->with([
            'categories' => Category::all(),
            'category' => Category::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'sometimes|string|max:250',
            'parent_id' => 'sometimes|nullable|integer',
        ]);

        Category::findOrFail($id)->update($request->all());
        
        session()->flash('status','La categoria se edito con exito');
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(request()->has('eliminar')){
            Category::withTrashed()->where('id', $id)->first()->forceDelete();
        }else{
            Category::withTrashed()->where('id', $id)->first()->delete();
        }
        
        return redirect()->route('categories.index')->with('status','Categoria eliminada correctamente');
    }

    public function exportImport(){
        return view('backend.categories.export-import');
    }

    public function export(){
        
        return Excel::download(new CategoriesExport, 'category-list.xlsx');

    }

    public function import(Request $request){
        $request->validate([
            'excel-file' => 'required|mimes:xlsx,xls',
        ]);
        
        Excel::import(new CategoryImport, $request->file('excel-file'));

        session()->flash('status','La importación fue exitosa');

        return redirect()->back();
    }

}

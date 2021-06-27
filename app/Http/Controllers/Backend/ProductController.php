<?php

namespace App\Http\Controllers\Backend;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Currency;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has("lista") && $request->input("lista") == "eliminados"){
            $products = Product::onlyTrashed()->get();
        }else{
            $products = Product::all();
        }

        return view('backend.products.index')->with([
            'categories' => Category::all(),
            'currencies' => Currency::all(),
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create')->with([
            'categories' => Category::all(),
            'currencies' => Currency::all(),
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
            'description' => 'nullable|string|max:250',
            'category_id' => 'required|integer',
            'currency_id' => 'required|integer',
            'price' => 'required|numeric',
            'sales_price' => 'required|numeric',
            'featured' => 'boolean',
            'active' => 'boolean',
        ]);

        Product::create($request->all());

        session()->flash('status','El producto se creo con exito');

        return view('backend.products.index')->with(['products' => Product::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.products.edit')->with([
            'categories' => Category::all(),
            'currencies' => Currency::all(),
            'product' => Product::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'nullable|string|max:250',
            'category_id' => 'required|integer',
            'currency_id' => 'required|integer',
            'price' => 'required|numeric',
            'sales_price' => 'required|numeric',
            'featured' => 'boolean',
            'active' => 'boolean',
        ]);

        Product::findOrFail($id)->update($request->except(['featured', 'active']));

        if($request->has('featured') && $request->featured == 1){
            $pro = Product::find($id);
            $pro->featured = 1;
            $pro->save();
        }else{
            $pro = Product::find($id);
            $pro->featured = 0;
            $pro->save();
        }

        if($request->has('active') && $request->active == 1){
            $pro = Product::find($id);
            $pro->active = 1;
            $pro->save();
        }else{
            $pro = Product::find($id);
            $pro->active = 0;
            $pro->save();
        }

        session()->flash('status','el producto se edito con exito');
        
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(request()->has('eliminar')){
            Product::withTrashed()->where('id', $id)->first()->forceDelete();
        }else{
            Product::withTrashed()->where('id', $id)->first()->delete();
        }
        
        return redirect()->route('products.index')->with('status','Producto eliminado correctamente');
    }
}

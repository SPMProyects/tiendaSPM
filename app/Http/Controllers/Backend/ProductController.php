<?php

namespace App\Http\Controllers\Backend;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Category;
use App\Currency;
use App\Image;
use App\Exports\ProductsExport;
use App\Exports\ImagesExport;
use App\Exports\ImagesProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Spm\Zipper\Facades\Zipper;


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

        $product = Product::create($request->all());

        //Inicio guardado de imágenes

        if($request->hasFile('images')){

            foreach ($request->file('images') as $image) {
                
                $complete_name = $image->getClientOriginalName();

                $image = Image::create([
                    'path' => $image->storeAs('images', $complete_name, 'public')
                ]);
                
                $product->images()->attach($image->id);

            }

        }

        //Fin guardado de imágenes

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

        Product::findOrFail($id)->update($request->except(['featured', 'active', 'images']));

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

        if($request->hasFile('images')){

            $product = Product::find($id);

            foreach ($request->file('images') as $image) {
           
                $complete_name = $image->getClientOriginalName();

                $image = Image::create([
                    'path' => $image->storeAs('images', $complete_name, 'public')
                ]);
                
                $images[] = $image->id;

            }

            foreach ($product->images as $imag) {
                $url = 'public/' . $imag->path;
                Storage::delete($url);
            }

            $product->images()->sync($images);

        }

        session()->flash('status','El producto se edito con exito');
        
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

    public function exportImport(){
        return view('backend.products.export-import');
    }

    public function export(){

        Excel::store(new ProductsExport, '\exports\products\products-list.xlsx');
        Excel::store(new ImagesExport, '\exports\products\images-list.xlsx');
        Excel::store(new ImagesProductsExport, '\exports\products\products-images-list.xlsx');

        //dump(storage_path('app\exports\products'));
        //dd();

        $folders_to_zip = [
            public_path() . '\storage\images',
            storage_path('app\exports\products'),
        ];

        $zip_file_name = public_path() . '\exports\products\products.zip';

        Zipper::setZipFileName($zip_file_name);
        Zipper::setFoldersToZip($folders_to_zip);
        Zipper::makeZip();

        return response()->download($zip_file_name)->deleteFileAfterSend();

    }

    public function import(){
        
    }
    

}

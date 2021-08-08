<?php

namespace App\Http\Controllers\Backend;

use App\Exports\ImagesExport;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Spm\Zipper\Facades\Zipper;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has("lista") && $request->input("lista") == "eliminados"){
            $images = Image::onlyTrashed()->get();
        }else{
            $images = Image::all();
        }

        return view('backend.images.index')->with([
            'images' => $images,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.images.create')->with([
            'products' => Product::all(),
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
            'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);
                
        $complete_name = $request->file('image')->getClientOriginalName();

        $image = Image::create([
            'path' => $request->file('image')->storeAs('images', $complete_name, 'public')
        ]);
        if($request->input('products')){
            foreach($request->input('products') as $product){
                $image->products()->attach($product);
            }
        }
        
        session()->flash('status','La imagen se subió con exito');

        return view('backend.images.index')->with(['images' => Image::all()]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.images.edit')->with([
            'products' => Product::all(),
            'image' => Image::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if($request->has('products')){
            foreach ($request->input('products') as $product) {
                $images[] = $product;
            }

            Image::findOrFail($id)->products()->sync($images);

        }
        
        session()->flash('status','La imagen se edito con exito');
        
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(request()->has('eliminar')){
            Image::withTrashed()->where('id', $id)->first()->forceDelete();

        }else{
            
            Image::find($id)->products()->detach();
            Image::withTrashed()->where('id', $id)->first()->delete();
            
        }
        
        return redirect()->route('images.index')->with('status','Imagen eliminada correctamente');
    }

    public function exportImport(){
        return view('backend.images.export-import');
    }

    public function export(){

        Excel::store(new ImagesExport, '\exports\images\images-list.xlsx');

        $folders_to_zip = [
            public_path() . '\storage\images',
            storage_path('app\exports\images'),
        ];

        $zip_file_name = public_path() . '\exports\images\images.zip';

        Zipper::setZipFileName($zip_file_name);
        Zipper::setFoldersToZip($folders_to_zip);
        Zipper::makeZip();

        return response()->download($zip_file_name)->deleteFileAfterSend();

    }

    public function import(){
        
    }

}

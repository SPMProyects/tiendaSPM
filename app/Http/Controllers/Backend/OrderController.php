<?php

namespace App\Http\Controllers\Backend;

use App\Exports\OrdersExport;
use App\Exports\OrdersProductExport;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\OrderImport;
use Maatwebsite\Excel\Facades\Excel;
use Spm\Zipper\Facades\Zipper;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has("lista") && $request->input("lista") == "eliminados"){
            $orders = Order::onlyTrashed()->get();
        }else{
            $orders = Order::all();
        }

        return view('backend.orders.index')->with([
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.orders.create')->with([
            'users' => User::all(),
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
        $user_id = $request->user_id;
        $total = 0;

        $order = Order::create([
            'user_id' => $user_id,
        ]);

        foreach (session('quantity') as $key => $value) {
            $id_product = $value->get('id');
            $quantity = $value->get('quantity');
            $price = Product::where('id','=',$id_product)->first()->price;
            $total += $price * $quantity;

            $order->products()->attach($id_product, [
                'price' => $price,
                'quantity' => $quantity,
            ]);

        }

        $order->total = $total;
        $order->save();

        session()->flash('status','La orden se creo con exito');

        return view('backend.orders.index')->with(['orders' => Order::all()]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Meter en la session quantity y products lo almacenado en la order
        //$this->delete_all_products();
        $order = Order::findOrFail($id);
        if(!session()->exists('products')){
            foreach ($order->products()->get() as $product) {
                session([
                    'products' => $order->products()->get()
                ]);
            
                $quantity = collect([
                    'id' => $product->id,
                    'quantity' => $product->pivot->quantity,
                ]);
                request()->session()->push('quantity', $quantity);
            }
            
        }

        return view('backend.orders.edit')->with([
            'users' => User::all(),
            'products' => Product::all(),
            'order' => $order,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $order = Order::findOrFail($id);
        $order->products()->detach();

        $order->user_id =  $request->user_id;
        
        $total = 0;
        foreach (session('quantity') as $key => $value) {
            $id_product = $value->get('id');
            $quantity = $value->get('quantity');
            $price = Product::where('id','=',$id_product)->first()->price;
            $total += $price * $quantity;

            $order->products()->attach($id_product, [
                'price' => $price,
                'quantity' => $quantity,
            ]);

        }

        $order->total = $total;
        $order->save();

        session()->flash('status','La orden se modifico con exito');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(request()->has('eliminar')){
            Order::withTrashed()->where('id', $id)->first()->products()->detach();
            Order::withTrashed()->where('id', $id)->first()->forceDelete();
        }else{
            Order::withTrashed()->where('id', $id)->first()->delete();
        }
        
        return redirect()->route('orders.index')->with('status','Orden eliminada correctamente');
    }

    public function productsAdd(Request $request){
        //Esto borra toda la session anterior, es solo para pruebas. En producción quitarlo
        //$request->session()->flush();

        //Array con todos los productos seleccionados
        $procesador = json_decode($request->id_products);

        //Con eloquent encontrar todos los productos seleccionados
        $products = Product::whereIn('id',$procesador)->get();

        //Agregar todos los productos seleccionados a la session products_order (No creada todavía)
        if(!session('products')){
            session([
                'products' => $products
            ]);
            foreach ($procesador as $p) {
                $quantity = collect([
                    'id' => $p,
                    'quantity' => 1,
                ]);
                request()->session()->push('quantity', $quantity);
            }
        }else{
            foreach($products as $product){
                //Verificar que el producto no se encuentre en la session y si se encuentra lo descarta
                $foundIt = true;
                foreach (session('products') as $p) {

                    if($p->id == $product->id){
                        $foundIt = false;
                    }
                }
                if($foundIt){
                    $request->session()->push('products', $product);
                    $quantity = collect([
                        'id' => $product->id,
                        'quantity' => 1,
                    ]);
                    request()->session()->push('quantity', $quantity);
                }
            }
            
        }
    }

    public function productsRemove(Request $request){
        //Almacenar el ID del producto que se recibe por AJAX
        $procesador = json_decode($request->id_products);

        //Encontrar un producto dentro de session con ese ID y eliminarlo
        foreach(session('products') as $key => $product){
            if($product->id == $procesador){
                session('products')->forget($key);

                //Elimina de quantity session el producto
                foreach (session('quantity') as $key => $prod) {
                    if($prod->get('id') == $procesador){
                        $quantity_session = session('quantity');
                        unset($quantity_session[$key]);
                        session()->forget('quantity');
                        session()->put('quantity',$quantity_session);
                    }
                }

            }
        }
        return json_encode(session('products'));
    }

    public function quantityChange(Request $request){
        //Borra todas las sessions para iniciar pruebas desde 0
        //request()->session()->forget('quantity');

        $id = json_decode($request->id_products);
        $quantity_product = json_decode($request->quantity_products);

        foreach (session('products') as $product) {
            $foundIt = false;
            if($product->id == $id){

                //Actualizar la cantidad de productos existentes
                if(session()->exists('quantity')){
                    foreach(session('quantity') as $k => $v){
                    
                        if($v->get('id') == $id){
                            $v->put('quantity', $quantity_product);
                            $foundIt = true;
                        }
                    }
                    if($foundIt == false){
                        //Creación de una nueva collection para la cantidad
                        $quantity = collect([
                            'id' => $id,
                            'quantity' => $quantity_product,
                        ]);
                        request()->session()->push('quantity', $quantity);
                    }
                }else{
                    //Creación de una nueva collection para la cantidad
                    $quantity = collect([
                        'id' => $id,
                        'quantity' => $quantity_product,
                    ]);
                    request()->session()->push('quantity', $quantity);
                };
            }
        }
    }

    public function delete_all_products(){
        session()->forget('quantity');
        session()->forget('products');
    }

    public function exportImport(){
        return view('backend.orders.export-import');
    }

    public function export(){
        
        Excel::store(new OrdersExport, '\exports\orders\orders-list.xlsx');
        Excel::store(new OrdersProductExport, '\exports\orders\ordersproducts-list.xlsx');

        $folders_to_zip = [
            storage_path('app\exports\orders'),
        ];

        $zip_file_name = public_path() . '\exports\orders\orders.zip';

        Zipper::setZipFileName($zip_file_name);
        Zipper::setFoldersToZip($folders_to_zip);
        Zipper::makeZip();

        return response()->download($zip_file_name)->deleteFileAfterSend();

    }

    public function import(Request $request){
        $request->validate([
            'excel-file' => 'required|mimes:xlsx,xls',
        ]);
        
        if($request->hasFile('excel-file')){
            
            Excel::import(new OrderImport, $request->file('excel-file'));

            session()->flash('status','La importación fue exitosa');

            return redirect()->back();
            
        }
    }

}

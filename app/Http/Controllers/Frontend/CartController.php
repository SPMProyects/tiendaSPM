<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Configuration;
use App\Category;
use App\Mail\NewOrder;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index(){
        return view('frontend.cart.index')->with([
            "configurations" => Configuration::find(1) ?? '',
            "categories" => Category::all() ?? '',
            "userId" => auth()->user()->id,
        ]);
    }

    public function addProduct(Product $product, Request $request){

        $userId = auth()->user()->id;

        if(\Cart::session($userId)->get($product->id) != null){
            \Cart::session($userId)->update($product->id,array(
                'quantity' => $request->quantity ?? 1
            ));
        }else{
            
            if($product->sales_price > 0){
                $price = $product->price * ((100-$product->sales_price)/100);
            }else{
                $price = $product->price;
            }

            \Cart::session($userId)->add(array(
                "id" => $product->id,
                "name" => $product->name,
                "price" => $price,
                "quantity" => $request->quantity ?? 1,
                "attributes" => array(),
                "associatedModel" => $product
            ));
        }

        return redirect()->back();
    }

    public function updateQuantity(Request $request){
        //Hay que resolver esta. Solo se actualiza la cantidad desde la pagina del cart.
        //Ver si hay que borrar la cantidad y luego añadir o solo actualizar
        $userId = auth()->user()->id;
        
        \Cart::session($userId)->update($request->id_product, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity_product,
                ]
            ]);

        $product = \Cart::session($userId)->get($request->id_product);
        $data = [
            'subtotal_product' => $product->getPriceSum(),
            'subtotal_cart' => \Cart::session($userId)->getSubTotal(),
            'total_cart' => \Cart::session($userId)->getTotal(),
            'cart_quantity' => \Cart::session($userId)->getTotalQuantity(),
        ];
        
        return json_encode($data);
    }

    public function removeProduct(Product $product){

        $userId = auth()->user()->id;
        \Cart::session($userId)->remove($product->id);

        return redirect()->back();
    }

    public function confirmCart(){
        
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => \Cart::session(Auth::id())->getTotal(),
        ]);

        foreach (\Cart::session(Auth::id())->getContent()->sortKeys() as $cartItem) {

            $order->products()->attach($cartItem->id, [
                'price' => $cartItem->price,
                'quantity' => $cartItem->quantity,
            ]);

        }

        $order->save();

        $configurations = Configuration::first();
        
        $data = [
            'name' => auth()->user()->name,
            'email' => json_decode(Configuration::findOrFail(1)->email_server)->sender,
        ];

        
        //Enviar correo al usuario con el detalle de la orden al usuario y a los administradores
        Mail::to(auth()->user()->email)->queue(new NewOrder($data));

        if(json_decode($configurations->email_server)->email_manager1){
            Mail::to(json_decode($configurations->email_server)->email_manager1)->queue(new NewOrder($data));
        };

        if(json_decode($configurations->email_server)->email_manager2){
            Mail::to(json_decode($configurations->email_server)->email_manager2)->queue(new NewOrder($data));
        };

        \Cart::session(Auth::id())->clear();

        return redirect()->back();
    }

}

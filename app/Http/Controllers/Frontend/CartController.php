<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Configuration;
use App\Category;

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

    }

}

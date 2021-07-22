<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Configuration;
use App\Category;
use App\Order;

class UserController extends Controller
{
    public function personalInformation(){

        return view('frontend.user.information')->with([
            "configurations" => Configuration::find(1) ?? '',
            "categories" => Category::all() ?? '',
        ]);
    }

    public function editPersonalInformation(Request $request){
        $userId = auth()->user()->id;
        
        if($request->input('password') == ''){
            $data = $request->only('name','email','address','admin');
        }else{
            $data = $request->all();
            $data['password'] = bcrypt($request->input('password'));
        }

        User::findOrFail($userId)->update($data);
        
        session()->flash('status','El usuario se edito con exito');
        
        return redirect()->back();
    }

    public function myOrders(){
        $userId = auth()->user()->id;
        
        return view('frontend.user.orders')->with([
            "configurations" => Configuration::find(1) ?? '',
            "categories" => Category::all() ?? '',
            "orders" => Order::where('user_id','=',$userId)->get(),
        ]);

    }

    public function orderDetails(Order $order){

        return view('frontend.user.order-detail')->with([
            "configurations" => Configuration::find(1) ?? '',
            "categories" => Category::all() ?? '',
            "order" => $order,
        ]);
    }

}

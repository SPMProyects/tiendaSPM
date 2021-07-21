<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Category;
use App\Product;
use App\Image;
use App\Order;
use App\Configuration;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //PRUEBAS
        \Cart::session(2)->add(
            [array(
            'id' => 1, // inique row ID
            'name' => 'Sample Item',
            'price' => 67.99,
            'quantity' => 4,
            'attributes' => array(),
            'associatedModel' => Product::find(1),
            ),
            array(
                'id' => 2, // inique row ID
                'name' => 'Sample Item 2',
                'price' => 677.99,
                'quantity' => 2,
                'attributes' => array(),
                'associatedModel' => Product::find(2),
            )
        ]);
        
        $items = \Cart::session(auth()->user()->id)->getContent();
        foreach($items as $row) {

            echo 'ID cart row: ' . $row->id ."<br>"; // row ID
            echo 'Name cart row: ' . $row->name ."<br>";
            echo 'Quantity cart row: ' . $row->quantity ."<br>";
            echo 'Price cart row: ' . $row->price ."<br>";
            echo 'Subtotal cart row: ' . $row->getPriceSum() ."<br><br><br>";
            /*
            echo $row->associatedModel->id."<br>"; // whatever properties your model have
            echo $row->associatedModel->name."<br>"; // whatever properties your model have
            echo $row->associatedModel->description."<br><br><br>"; // whatever properties your model have
            */
        }

        dump($items->sortKeys());

        dd();
        return view('home');
    }
}

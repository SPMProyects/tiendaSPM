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
        
        dump(CountAllProudctInCategory(1));
        dd();
        return view('home');
    }
}

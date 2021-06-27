<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Category;

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
        
        //dump(Category::all()->random(1)->toArray());
        $category = Category::all()->random(1)->toArray();
        dump($category[0]['id']);

        dd();

        return view('home');
    }
}

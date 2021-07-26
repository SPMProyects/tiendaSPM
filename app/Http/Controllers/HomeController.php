<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Category;
use App\Product;
use App\Image;
use App\Order;
use App\Configuration;
use App\Mail\NewUser;
use Illuminate\Support\Facades\Mail;

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
        $user =[
            'name' => 'Santiago',
            'email' => 'santiago@santiago.com',
        ];

        Mail::to('santiagopereyra2702@gmail.com')->queue(new NewUser($user));

        //return new NewUser($user);

        return 'Mensaje enviado';

        //$configurations = Configuration::first();
        //dump($configurations->general);
        //dump(json_decode($configurations->general)->store_name);

        dd();
        //return view('home');
    }
}

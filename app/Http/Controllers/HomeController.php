<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Category;
use App\Product;
use App\Image;
use App\Order;
use App\Configuration;
use App\Mail\NewUser;
use App\Zipper\Facades\Zipper;
use FilesystemIterator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

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
        
        dd();
        return view('home');

    }

    

       
    


}

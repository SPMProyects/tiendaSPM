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
        Storage::disk('public')->deleteDirectory('company');
        Storage::disk('public')->deleteDirectory('home');
        Storage::disk('public')->deleteDirectory('general');
        Storage::disk('public')->deleteDirectory('popup');
        Storage::disk('public')->move('import\configuration\company', '\company');
        Storage::disk('public')->move('import\configuration\home', '\home');
        Storage::disk('public')->move('import\configuration\general', '\general');
        Storage::disk('public')->move('import\configuration\popup', '\popup');

        //Storage::disk('public')->delete($name_path_full);

        //Storage::disk('public')->deleteDirectory('import/' . $name);

        dd();
        return view('home');

    }

    

       
    


}

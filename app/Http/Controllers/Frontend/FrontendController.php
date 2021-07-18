<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Configuration;
use App\Category;
use App\Product;

class FrontendController extends Controller
{
    public function home(){
        return view('frontend.home.index')->with([
            "configurations" => Configuration::find(1) ?? '',
            "categories" => Category::all() ?? '',
        ]);
    }

    public function company(){
        return view('frontend.company.index')->with([
            "configurations" => Configuration::find(1) ?? '',
            "categories" => Category::all() ?? '',
        ]);
    }

    public function contact(){
        return view('frontend.contact.index')->with([
            "configurations" => Configuration::find(1) ?? '',
            "categories" => Category::all() ?? '',
        ]);
    }

    public function store(){
        return view('frontend.store.index')->with([
            "configurations" => Configuration::find(1) ?? '',
            "categories" => Category::all() ?? '',
            "products" => Product::paginate(16) ?? '',
        ]);
    }
}

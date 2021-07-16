<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Configuration;
use App\Category;

class FrontendController extends Controller
{
    public function home(){
        return view('frontend.home.index')->with([
            "configurations" => Configuration::find(1) ?? '',
            "categories" => Category::all(),
        ]);
    }

    public function company(){
        return view('frontend.company.index')->with([
            "configurations" => Configuration::find(1) ?? '',
            "categories" => Category::all(),
        ]);
    }
}

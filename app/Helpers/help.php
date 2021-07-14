<?php
use App\Product;

function getRandomFeatured($number){
    $productsFeatured = Product::where('featured','=',1)->limit($number)->get();
    if($productsFeatured){
        return $productsFeatured;
    }else{
        return "No hay productos creados";
    }
}
<?php
use App\Product;
use App\Category;
use App\Configuration;

function getRandomFeatured($number){
    $productsFeatured = Product::where('featured','=',1)->limit($number)->get();
    return $productsFeatured;
}

function getRandomSales($number){
    $productsSales = Product::where('sales_price','>',0)->limit($number)->get();
    return $productsSales;
}

function getCategories($number){
    $Categories = Category::all()->take($number);
    return $Categories;
}

function getRandomProducts($productsCollection, $number){
    if($productsCollection->count() > $number){
        return $productsCollection->random($number);
    }else{
        return $productsCollection->random($productsCollection->count());
    }
}

function CountAllProudctInCategory($id){
    $productsCategory = 0;
    $category = Category::find($id);
    $productsCategory += $category->products()->count();
    if($category->categories()){
        foreach($category->categories as $sub_category){
            $productsCategory += $sub_category->products()->count();
        }
    }
    return $productsCategory;
}

function currencyFormat($monto, $descuento = 0){
    if($descuento == 0){
        $price = $monto;
    }else{
        $price = $monto * (1-($descuento/100));
    }
    return "$ " . number_format($price,2);
}

function salesFormat($descuento){
    return "-" . number_format($descuento) . "%";
}

function getConfig($column, $field){
    $configurations = Configuration::find(1) ?? '';
    if($configurations != ''){
        return json_decode($configurations->$column)->$field;
    }else{
        return '';
    }
    
}
<?php
use App\Product;

function getRandomFeatured($number){
    $productsFeatured = Product::where('featured','=',1)->limit($number)->get();
    return $productsFeatured;
}

function getRandomSales($number){
    $productsSales = Product::where('sales_price','>',0)->limit($number)->get();
    return $productsSales;
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
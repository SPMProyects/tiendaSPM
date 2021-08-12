<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductSheetImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        if($product = Product::find($row['id'])){
            $row['name'] ? $product->name = $row['name'] : $product->name = $product->name;
            $row['description'] ? $product->description = $row['description'] : $product->description = $product->description;
            $row['category_id'] ? $product->category_id = $row['category_id'] : $product->category_id = $product->category_id;
            $row['currency_id'] ? $product->currency_id = $row['currency_id'] : $product->currency_id = $product->currency_id;
            $row['price'] ? $product->price = $row['price'] : $product->price = $product->price;
            $row['sales_price'] ? $product->sales_price = $row['sales_price'] : $product->sales_price = $product->sales_price;
            $row['active'] ? $product->active = $row['active'] : $product->active = $product->active;
            $row['featured'] ? $product->featured = $row['featured'] : $product->featured = $product->featured;
        
            $product->save();
            
            return;
        }else{
            
            $product = Product::create([
                'name' => $row['name'],
                'description' => $row['description'],
                'category_id' => $row['category_id'],
                'currency_id' => $row['currency_id'],
                'price' => $row['price'],
                'sales_price' => $row['sales_price'],
                'active' => $row['active'],
                'featured' => $row['featured'],
            ]);

            return;
        }
    }
}

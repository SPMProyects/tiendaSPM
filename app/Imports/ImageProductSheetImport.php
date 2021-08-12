<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use App\Product;

class ImageProductSheetImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $product = Product::find($row['product_id']);
        
        if($product != null && $product->id > 0){
  
            if($product->images != null && $product->images->count() > 0){
                foreach ($product->images as $image) {
                
                    if($image->id == $row['image_id']){
                        return;
                    }
                }
            }
            $product->images()->sync($row['image_id']);
        }
        return;
    }
}

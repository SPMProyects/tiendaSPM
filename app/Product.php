<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'category_id', 'currency_id', 'price', 'sales_price', 'featured', 'active'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }
}

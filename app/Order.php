<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'total',
    ];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('price','quantity');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function totalQuantity(){
        $totalQuantity = 0;
        foreach ($this->products as $product) {
            $totalQuantity += $product->pivot->quantity;
        }

        return $totalQuantity;
    }

}

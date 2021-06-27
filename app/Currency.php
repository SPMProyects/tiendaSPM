<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Currency extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'value',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

}

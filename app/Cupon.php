<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Cupon extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'active', 'maximum_uses', 'time_alive', 'value', 'type',
    ];
}

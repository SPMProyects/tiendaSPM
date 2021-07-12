<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = [
        'general', 'home_page', 'company_page', 'chat' , 'contact_social', 'email_server', 'pop_ups',  
    ];

}

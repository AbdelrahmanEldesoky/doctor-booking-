<?php

namespace App\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;



    public function getNameAttribute()
    {
           $key = 'name_'.Config::get('app.locale');
            return $this->$key;
        
    }
}

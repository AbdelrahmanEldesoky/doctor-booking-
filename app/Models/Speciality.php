<?php

namespace App\Models;

use Illuminate\Support\Facades\Config;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;

    protected $fillable=[
        'status',
        'name',
        'name_en',
        'name_ar',
        'image',
    ];

    public function getImageAttribute($value)
    {
        if ($value) {
            return asset($value);
        } else {
            return asset('frontend/images/icons/pediatrics.svg');
        }
    }

    public function getNameAttribute()
    {
           $key = 'name_'.Config::get('app.locale');
            return $this->$key;
        
    }
}

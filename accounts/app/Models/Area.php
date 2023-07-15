<?php

namespace App\Models;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'name_en',
        'name_ar',
    ];

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public function getNameAttribute()
    {
           $key = 'name_'.Config::get('app.locale');
            return $this->$key;
        
    }
}

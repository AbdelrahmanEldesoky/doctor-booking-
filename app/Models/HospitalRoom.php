<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class HospitalRoom extends Model
{
    use HasFactory;

    protected $fillable=[
        'hospital_id',
        'speciality',
        'type',
        'type_ar',
        'size',
        'price',
        'price_outsider',
    ];

    public function getLangNameAttribute()
    {
       $key =  Config::get('app.locale') == 'en' ? 'type' : 'type_'.Config::get('app.locale');
       return $this->$key ?? $this->type;
    }
    
    public function hospital()
    {
        return $this->belongsTo(User::class, 'hospital_id');
    }
}

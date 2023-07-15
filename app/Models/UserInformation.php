<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class UserInformation extends Model
{
    use HasFactory;

    protected $fillable =[
        'hospital',
        'clinic',
        'about',
        'area',
        'user_id',
        'city',
        'country',
        'phone',
        'state',
        'area',
        'image',
        'phone',
        'gender',
        'job_title',
        'job_title_ar',
        'inssurance',
        'specialities',
    ];


    public function area()
    {
        return $this->belongsTo(Area::class,'area');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city');
    }

    public function getLangJobTitleAttribute()
    {
       $key =  Config::get('app.locale') == 'en' ? 'job_title' : 'job_title_'.Config::get('app.locale');
       return $this->$key ?? $this->job_title;
    }
//    protected $casts =[
//        'specialities' => 'arrays'
//    ];
}

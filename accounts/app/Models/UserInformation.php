<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'rate_count',
        'specialities',
        'embed_link'
    ];


    public function area()
    {
        return $this->belongsTo(Area::class,'area');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city');
    }
//    protected $casts =[
//        'specialities' => 'arrays'
//    ];
}

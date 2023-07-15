<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class DoctorClinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'name_en',
        'name_ar',
        'city',
        'area',
        'location_ar',
        'location_en',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'clinic_id');
    }
    public function myArea()
    {
        return $this->belongsTo(Area::class, 'area');
    }
    public function myAreas()
    {
        return $this->hasMany(DoctorArea::class, 'clinic_id');
    }

    public function getLangNameAttribute()
    {
       $key =  'name_'.Config::get('app.locale');
       return  $this->$key;
    }
    public function getLangLocationAttribute()
    {
       $key =  'location_'.Config::get('app.locale');
       return  $this->$key;
    }
}

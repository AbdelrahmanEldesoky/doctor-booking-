<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorClinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'name_en',
        'is_show',
        'location_en',
        'name_ar',
        'location_ar',
        'city',
        'area',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function myArea()
    {
        return $this->belongsTo(Area::class,'area');
    }
    public function myCity()
    {
        return $this->belongsTo(City::class,'city');
    }

    public function myAreas()
    {
        return $this->hasMany(DoctorArea::class, 'clinic_id');
    }
    
    public function getNameAttribute()
    {
        return $this->name_en;
    }
}

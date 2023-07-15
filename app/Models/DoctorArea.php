<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorArea extends Model
{
    use HasFactory;

    protected $fillable =[
        'doctor_id',
        'clinic_id',
        'area_id',
        'type'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorLog extends Model
{
    use HasFactory;

    protected $fillable=[
        'doctor_id',
        'schedule_id',
        'type',
        'data'
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class,'doctor_id');
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class,'schedule_id');
    }
    
}

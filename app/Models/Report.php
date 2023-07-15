<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable=[
        'doctor_id',
        'patient_id',
        'schedule_id',
        'appointment_id',
        'session_amount',
        'paid_amount',
        'status',
    ];

    
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'from',
        'to',
        'interval',
        'session_price',
        'session_price_outside',
        'status',
        'schedule_type',
        'interval_type',

        'clinic_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function clinic()
    {
        return $this->belongsTo(DoctorClinic::class, 'clinic_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Exports\DataTablesCollectionExport;


class Appointment extends Model
{
    use HasFactory;


    protected $fillable = [
        'doctor_id',
        'hospital_id',
        'from',
        'to',
        'patient_id',
        'schedule_id',
        'status',
        'amount',
        'join_url',
        'type',
        'room_id',
        'user_type',
        'clinic_id',
          'invoice_id',
        'invoice_type',
        'payment_status',
        'invoice_code',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class,'doctor_id');
    }
    public function hospital()
    {
        return $this->belongsTo(User::class,'hospital_id');
    }
    public function patient()
    {
        return $this->belongsTo(User::class,'patient_id');
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class,'schedule_id');
    }
}

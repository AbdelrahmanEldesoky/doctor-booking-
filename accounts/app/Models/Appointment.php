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
        'room_id',
        'clinic_id',
        'status',
        'amount',
        'start_url',
        'join_url',
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
    public function room()
    {
        return $this->belongsTo(HospitalRoom::class,'room_id');
    }
}

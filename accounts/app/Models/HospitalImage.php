<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalImage extends Model
{
    use HasFactory;

    protected $fillable=[
        'hospital_id',
        'room_id',
        'image',
    ];

    public function hospital()
    {
        return $this->belongsTo(User::class, 'hospital_id');
    }
    public function hospital_room()
    {
        return $this->belongsTo(HospitalRoom::class, 'room_id');
    }
}

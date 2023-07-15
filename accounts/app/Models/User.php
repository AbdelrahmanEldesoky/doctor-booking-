<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'name_ar',
        'email',
        'is_show',
        'image',
        'my_price',
        'role',
        'password',
        'remember_token',
        'status',
        'is_add',
        'percentage',
        'percentage_outside',
        'ofline_percentage',
        'online_price',
        'ofline_price',
        'online_price_outside',
        'ofline_price_outside',
        'waiting_time',
        'cs_number',
        'residence',
        'zoom_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('uploads/images/' . $value);
        } else {
            return asset('images/images.jpg');
        }
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class,'user_id');
    }
    public function reports()
    {
        return $this->hasMany(Report::class,'doctor_id');
    }

    public function information()
    {
        return $this->hasOne(UserInformation::class,'user_id');
    }

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class, 'user_specialities',
            'user_id', 'speciality_id');
    }
    public function areas()
    {
        return $this->belongsToMany(Area::class, 'doctor_areas',
            'doctor_id', 'area_id');
    }
    public function patients()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }
    public function doctorAppointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    
    public function doctorLogs()
    {
        return $this->hasMany(User::class,'doctor_id');
    }
   
    public function clinics()
    {
        return $this->hasMany(DoctorClinic::class, 'doctor_id');
    }
}

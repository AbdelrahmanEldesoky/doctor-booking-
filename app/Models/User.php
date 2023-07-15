<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
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
        'my_price',
        'image',
        'role',
        'residence',
        'password',
        'remember_token',
        'status',
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
        // return asset('images/fake.jpg');
        if ($value) {
            return asset('uploads/images/' . $value);
        } else {
            return asset('images/images.jpg');
        }
    }
    public function getLangNameAttribute()
    {
       $key =  Config::get('app.locale') == 'en' ? 'name' : 'name_'.Config::get('app.locale');
       return $this->$key ?? $this->name;
    }


    public function scopeSelection($query)
    {   
        if( app()->getLocale()  == 'ar'){
        return $query->select('id', 'name_' . app()->getLocale(). ' as name','image');
        }else{
            return $query->select('id', 'name','image');
        }
    }


    public function schedules()
    {
        return $this->hasMany(Schedule::class,'user_id')->where('is_show',1);
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
    public function doctorRatings()
    {
        return $this->hasMany(Rating::class, 'user_id');
    }
    public function hospitalRatings()
    {
        return $this->hasMany(Rating::class, 'user_id');
    }
    public function rateBy()
    {
        return $this->hasOne(Rating::class, 'rate_by');
    }

 
    public function avgReviewRating()
    {
        return $this->doctorRatings()->avg('rating');
    }

    public function clinics()
    {
        return $this->hasMany(DoctorClinic::class, 'doctor_id');
    }



    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}

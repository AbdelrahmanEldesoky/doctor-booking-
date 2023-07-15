<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable=[
        'email',
        'name',
        'city',
        'country',
        'address',
        'image',
        'description',
        'created_by',
    ];
}

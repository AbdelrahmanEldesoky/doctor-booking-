<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'sender',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function senderUser()
    {
        return $this->belongsTo(User::class,'sender');
    }
}

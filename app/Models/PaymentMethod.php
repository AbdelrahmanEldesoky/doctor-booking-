<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'bank_name',
        'branch_name',
        'swift_code',
        'iban',
        'account_name',
        'account_number',
        'wallet_type',
        'mobile_number',
        'status',
        'type',
    ];
}

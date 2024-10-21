<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazorpaySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'razorpay_key',
        'razorpay_secret_key'
    ];

}

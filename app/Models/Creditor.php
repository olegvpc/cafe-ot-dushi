<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creditor extends Model
{
    use HasFactory;
    protected $hidden = [
        'user_id',
        'payment_id',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'menus',
        'total_amount',
        'accepted', 'accepted_at',
        'canceled_at', 'comment',
        'done', 'done_at',
    ];
    protected $casts = [
        'total_amount' => 'float',
        'accepted' => 'boolean',
        'accepted_at' => 'datetime',
        'canceled_at' => 'datetime',
        'done' => 'boolean',
        'done_at' => 'datetime',
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}

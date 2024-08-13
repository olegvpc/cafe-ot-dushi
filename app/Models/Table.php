<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Table extends Model
{
    use HasFactory;
    // Id table у нас СТРОКОВОЕ значение - нужно убрать из модели автоматическое увеличение значения
    public $incrementing = false;

    protected $fillable = [
        'id',
        'is_free', 'order_id',
        'sort',
    ];
    protected $casts = [
        'is_free' => 'boolean',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

}

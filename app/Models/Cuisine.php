<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cuisine extends Model
{
    use HasFactory;
    // Id cuisine у нас СТРОКОВОЕ значение - нужно убрать из модели автоматическое увеличение значения
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name', 'sort',
    ];

    protected $casts = [
//        'price' => 'float',
    ];

    // добавление возможности Eloquent
    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    // Id categori у нас СТРОКОВОЕ значение - нужно убрать из модели автоматическое увеличение значения
    public $incrementing = false;
    protected $fillable = [
        'id',
        'name', 'sort',
    ];


    // преобразование данных перед показом $currency->price ~ 89,32 - float
    protected $casts = [
//        'price' => 'float',
    ];

    // добавление возможности Eloquent
    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }
}

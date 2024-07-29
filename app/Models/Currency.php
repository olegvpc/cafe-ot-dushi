<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    public $incrementing = false;

    // указаваем другую БД для хранения данных
    // protected $connecion = 'second';

    // объявляем поля в таблице, которые можно внести при создании записи в БД через модель
    // Currency::create(['id' => 'RUB', 'name' => 'Rubble', 'price' => 1, 'password' => 'secret2'])
    protected $fillable = [
        'id',
        'name', 'price',
        'active', 'sort',
    ];

    // обратное от fillable - объявляем запрещенные для редактирования полей
    protected $guarded = [];

    // скрываем поля для JSON, array или string ( $currency->toArray())
    protected $hidden = [
//        'price',
    ];

    // преобразование данных перед показом $currency->price ~ 89,32 - float
    protected $casts = [
        'price' => 'float',
        'active' => 'boolean',
    ];

    protected $dates = [
        // перечисляем датные поля которые нужно преобразовывать в Corbon
    ];
}

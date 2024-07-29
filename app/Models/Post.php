<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property bool $published
 * @property Carbon $published_at
 */

/**
 * @property bool $published
 * @property Carbon $published_at
 */
class Post extends Model
{
    use HasFactory;

//    protected $attributes = [
//        'isPublished' => $this->isPublished(),
//    ];

    protected $fillable = [
        'user_id',
        'title', 'content',
        'published', 'published_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'datetime',
    ];

    // protected $dates = [
    // 	'published_at',
    // ];

    // ТЕМА ЧТЕНИЕ ДАННЫЗ ИЗ БД
    // Делаем кастомный метод у Класса Модели Post
    //> $post->isPublished()
    //= true

    public function isPublished(): bool
     {
        return $this->published && $this->published_at;
    }

}

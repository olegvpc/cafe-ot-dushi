<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description',
        'image', 'active', 'price', 'category_id', 'cuisine_id'
    ];

    protected $casts = [
        'active' => 'boolean',
        'price' => 'float',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function cuisine()
    {
        return $this->belongsTo(Cuisine::class);
    }
}

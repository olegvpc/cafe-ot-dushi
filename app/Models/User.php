<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // У родителя Модели есть это свойство, но оно пустое и если через форму данные не приходят, то модель
    // про эти поля ничего не знает. Мы можем в модели ввести данные по умолчанию
    protected $attributes = [
        'admin' => false,
        'active' => true,
    ];
    protected $fillable = [
        'name', 'email', 'avatar',
        'active', 'admin', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'admin' => 'boolean',
        ];
    }
// добавление возможности Eloquent
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}

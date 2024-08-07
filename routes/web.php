<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\DonateController;
use App\Http\Controllers\User\MenuController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\User\PostController;

Route::redirect('/home', '/');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('home')->group(function () {
    Route::view('/login', 'home.login')->name('home.login');
    Route::get('/russian-menu', [HomeController::class, 'getRussianMenu'])->name('home.russian-menu');
    Route::get('/thai-menu', [HomeController::class, 'getThaiMenu'])->name('home.thai-menu');
    Route::view('/special-menu', 'home.special')->name('home.special-menu');
});

// Переносим все роуты с постами в файл routes.user.php


// Создание роутов для регистрации и авторизации пользователей - работает только для гостевых юзеров
Route::middleware('guest')->group(function(){
//    Route::get('/register', [RegisterController::class, 'index'])->name('register');
//    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware('auth')->group(function(){
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::prefix('user')->group(function () {
        Route::get('/menus', [MenuController::class, 'index'])->name('user.menus.index');
        Route::get('/menus/create', [MenuController::class, 'create'])->name('user.menus.create');
        Route::post('/menus', [MenuController::class, 'store'])->name('user.menus.store');
        Route::get('/menus/{menu}', [MenuController::class, 'show'])->name('user.menus.show')->whereNumber('menu');
        Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('user.menus.edit');
        Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('user.menus.update');
        Route::delete('/menus/{menu}', [MenuController::class, 'delete'])->name('user.menus.delete');
    });
});



Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
//    Artisan::call('backup:clean');
    return "Кэш очищен.";});

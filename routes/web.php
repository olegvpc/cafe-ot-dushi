<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\DonateController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\User\PostController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


//Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');
//Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->whereNumber('post');

// тоже самое - 2 роута через определение ресурсов
//Route::resource('posts', PostController::class)->only(['index', 'show']);

// Перенесем все ресурсы с постами в домен user http://localhost/user/posts
//Route::prefix('user')->group(function () {
//    Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');
//    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->whereNumber('post');
//});

//// Добавление метода as('user.') - добавляет user к неймингу
//Route::prefix('user')->as('user.')->group(function () {
//    Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');
//    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->whereNumber('post');
//});

// Добавление метода as('user.') - добавляет user к неймингу НО ПЛОХО тогда искать нужный нейминг
//Route::prefix('user')->group(function () {
//    Route::get('/posts/index', [PostController::class, 'index'])->name('user.posts.index');
//    Route::get('/posts/{post}', [PostController::class, 'show'])->name('user.posts.show')->whereNumber('post');
//});

// Переносим все роуты с постами в файл routes.user.php


Route::redirect('/blog', '/blog/index', '302')->name('blog.redirect');

// Создание роутов для регистрации и авторизации пользователей - работает только для гостевых юзеров
Route::middleware('guest')->group(function(){
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
//Route::get('/login/{user}/confirmatin', [LoginController::class, 'confirmation'])->name('login.confirmation');
//Route::post('/login/{user}/confirm', [LoginController::class, 'confirm'])->name('login.confirm');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Создание ресурса blog с тремя методами
Route::get('/blog/index', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/{post}/like', [BlogController::class, 'like'])->name('blog.like');

Route::prefix('user')->group(function () {
//    Route::get('/posts/index', [PostController::class, 'index'])->name('user.posts.index');
//    Route::get('/posts/{post}', [PostController::class, 'show'])->name('user.posts.show')->whereNumber('post');

    Route::get('/posts', [PostController::class, 'index'])->name('user.posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('user.posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('user.posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('user.posts.show')->whereNumber('post');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('user.posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('user.posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('user.posts.delete');

    Route::get('/donates', DonateController::class)->name('user.donates');
});

// тестирование валидации
Route::get('/validation', [ValidationController::class, 'index'])->name('validation.index');
Route::post('/validation', [ValidationController::class, 'store'])->name('validation.store');

// Создание тестовых постов
Route::get('/create-posts', [CreatePostsController::class, 'index'])->name('create-posts.index');
Route::post('/create-posts', [CreatePostsController::class, 'store'])->name('create-posts.store');
Route::post('/create-donates', [CreatePostsController::class, 'storeDonates'])->name('create.donates');

// Создание helpers для транзакций
Route::get('/transaction', TransactionController::class)->name('transaction');


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('backup:clean');
    return "Кэш очищен.";});

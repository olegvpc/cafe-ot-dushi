<?php

namespace App\Http\Controllers;


use App\Http\Controllers\User\MenuController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PaymentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


Route::redirect('/home', '/');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('home')->group(function () {
    Route::view('/login', 'home.login')->name('home.login');
    Route::get('/russian-menu', [HomeController::class, 'getRussianMenu'])->name('home.russian-menu');
    Route::get('/thai-menu', [HomeController::class, 'getThaiMenu'])->name('home.thai-menu');
    Route::get('/special-menu', [HomeController::class, 'getSpecialMenu'])->name('home.special-menu');
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

        Route::get('/menus/list', [MenuController::class, 'list'])->name('user.menus.list');
        Route::get('/menus/export', [MenuController::class, 'export'])->name('user.menus.export');

        // routers for orders
        Route::get('/orders', [OrderController::class, 'index'])->name('user.orders.index');
        // Созается order но без списка меню
        Route::get('/orders/create/{order}', [OrderController::class, 'createOrder'])->name('user.orders.create');
        // Добавление блюда список заказа (order)
        Route::patch('/orders/{order}', [OrderController::class, 'add'])->name('user.orders.add');
        // Удаление пункта меню из списка заказа (order)
        Route::delete('/orders/destroy/{order}', [OrderController::class, 'destroy'])->name('user.orders.destroy');
        // Показываем страницу с формой для комментария при ОБНУЛЕНИИ стола с заказом
        Route::get('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('user.orders.cancel');
        // Показываем order
        Route::get('/orders/{order}/show', [OrderController::class, 'show'])->name('user.orders.show');
        // Cancel заказа - выполнение
        Route::put('/orders/{order}', [OrderController::class, 'delete'])->name('user.orders.delete');
        // Сохраняется ВЫПОЛНЕНИЕ заказа список меню в order
        Route::post('/orders/{order}', [OrderController::class, 'store'])->name('user.orders.store');
        // Созается order но без списка меню
        Route::post('/orders/print/{order}', [OrderController::class, 'printOrder'])->name('user.orders.print');

        Route::get('/report', [OrderController::class, 'report'])->name('user.report');

        Route::get('/payments', [PaymentController::class, 'index'])->name('user.payments.index');
        Route::get('/payments/create', [PaymentController::class, 'create'])->name('user.payments.create');
        Route::post('/payments', [PaymentController::class, 'store'])->name('user.payments.store');
        Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('user.payments.edit');
        Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('user.payments.update');

    });
});

//php artisan route:cache
//php artisan route:clear
//php artisan config:cache
//php artisan config:clear
//php artisan optimize

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
//    Artisan::call('backup:clean');
    return "Кэш очищен.";});

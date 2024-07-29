<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function __invoke()
    {
        // кастомный хелпер transaction чтобы откатывать неудавшиеся транзакции
        transaction(function () {
            User::query()->create([
                'name' =>  fake()->name(),
                'email' => fake()->email(),
                'password' => bcrypt(str()->random()),
            ]);
            // бросаем исключение между двумя записями чтобы проверить что при ошибке нет ни первой ни второй записи
            throw new Exception;

            User::query()->create([
                'name' =>  fake()->name(),
                'email' => fake()->email(),
                'password' => bcrypt(str()->random()),
            ]);
        });
        alert(__('Регистрация в transactions!'), 'success');
        return redirect()->route('blog.index');

    }
}

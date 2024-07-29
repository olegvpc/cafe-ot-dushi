<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Donate;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreatePostsController extends Controller
{
    public function index() {
        return view('create-posts.index');
    }

    public function store(Request $request)
    {
        for ($i = 0; $i < 99; $i++) {
            $post = Post::query()->create([
                'user_id' => User::query()->value('id'), // первого попавшего юзера
                'title' => fake()->sentence(),
                'content' => fake()->paragraph(),
                'published_at' => fake()->dateTimeBetween(now()->subYear(), now()),
                'published' => true,
            ]);
        }

        alert(__('Тестовые Посты созданы'), 'success');
        return redirect()->route('blog.index');

    }

    public function storeDonates(Request $request)
    {
        // return 'CREATE DONATES METHOD';
        for ($i = 0; $i < 10000; $i++) {
            $currencies = Currency::query()->get();
            // Получаем Коллекцию - на ней можно получить рандомное значение
            // dd($currencies->random()->id);

            // поле created_at мы не можем заполнить тЮкЮ оно не указано в filable - поэтому forceCreate
            $post = Donate::query()->forceCreate([
                'created_at' => now()->subDays(rand(1, 1000)),
                'amount' => rand(1, 1000),
                'currency_id' => $currencies->random()->id,
            ]);
        }

        alert(__('Тестовые Пожертвования созданы'), 'success');
        return redirect()->route('blog.index');

    }

}

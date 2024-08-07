<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // images/no-image.jpeg
        $dishes = [
            [
                'title' => 'Борщ / Russian beetroot soup',
                'description' => 'Вкусный и полезный суп.',
                'price' => 95,
                'cuisine_id' => 'RUS',
                'category_id'=> 'SOUP',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Куриный суп / Chicken soup',
                'description' => 'Вкусный суп на наваристом курином бульоне и итальянской лапше.',
                'price' => 80,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SOUP',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Салат Оливье/ Olivie salad',
                'description' => 'Закусочный салат русской кухни из отварных корнеплодов, солёных огурцов, яиц с мясом или варёной колбасой в майонезной заправке.',
                'price' => 80,
                'cuisine_id' => 'RUS',
                'category_id'=> 'SALAD',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Салат из курицы / Chicken salad',
                'description' => 'Салаты из курицы содержат очень много белка, а значит, их можно есть даже вечером.',
                'price' => 100,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SALAD',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Папая салат "Som Tam" / Papaya salad "Som Tam"',
                'description' => 'Классический тайский салат',
                'price' => 80,
                'cuisine_id' => 'THAI',
                'category_id'=> 'SALAD',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Голубцы" / Golubtsi (cabbage meat rolls)',
                'description' => 'Наши голубцы всем голубцам голубцы. Обязательно нужно попробовать',
                'price' => 130,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Куриный стейк с гарниром" / Chicken stack',
                'description' => 'Классическая куриная грудка поджаренная до румяной корочки',
                'price' => 140,
                'cuisine_id' => 'ALL',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Куриные контлеты с гарниром" / Chicken patty - burger with side dish',
                'description' => 'Классическая куриная котлета в панировке с гарниром на выбор',
                'price' => 120,
                'cuisine_id' => 'ALL',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Салат из крабовых палочек" / Crab-sticks salad',
                'description' => 'Салат из крабовых палочек с кукурузой, рисом и вареными яйцами - вкусная и очень популярная закуска.',
                'price' => 95,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SALAD',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
        ];
        foreach ($dishes as $dish) {
            Menu::query()->firstOrCreate([
                'title' => $dish['title']
            ], [
                'description' => $dish['description'],
                'price' => $dish['price'],
                'cuisine_id' => $dish['cuisine_id'],
                'category_id' => $dish['category_id'],
                'active'=> $dish['active'],
                'image' => $dish['image'],
            ]);
        }

    }
}

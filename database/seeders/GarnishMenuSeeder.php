<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GarnishMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // images/no-image.jpeg
        $garnishes = [
            [
                'title' => 'Картофельное пюре / Mashed potatoes / มันฝรั่งบด',
                'description' => 'Со вкусом и по-домашнему приготовленное пюре.',
                'price' => 60,
                'cuisine_id' => 'ALL',
                'category_id'=> 'GARNISH',
                'active' => true,
                'image' => 'menu-images/garnish-potato-mush.jpeg'
            ],
            [
                'title' => 'Отварной рис / Сooked rice / ข้าว',
                'description' => 'Отварной рис',
                'price' => 40,
                'cuisine_id' => 'ALL',
                'category_id'=> 'GARNISH',
                'active' => true,
                'image' => 'menu-images/garnish-rice.jpeg'
            ],
            [
                'title' => 'Картофель фри / French fries / เฟรนช์ฟรายส์',
                'description' => 'Картофель фри',
                'price' => 50,
                'cuisine_id' => 'ALL',
                'category_id'=> 'GARNISH',
                'active' => true,
                'image' => 'menu-images/garnish-potato-free.jpeg'
            ],
            [
                'title' => 'Жареный картофель / Fried potatoes / มันฝรั่งทอด',
                'description' => 'Жареный картофель',
                'price' => 70,
                'cuisine_id' => 'ALL',
                'category_id'=> 'GARNISH',
                'active' => true,
                'image' => 'menu-images/garnish-potato-fried.jpeg'
            ],
            [
                'title' => 'Гречка / Buckwheat / บัควีท',
                'description' => 'Гречка отборная',
                'price' => 90,
                'cuisine_id' => 'ALL',
                'category_id'=> 'GARNISH',
                'active' => true,
                'image' => 'menu-images/garnish-grecha.jpeg'
            ],
        ];
        foreach ($garnishes as $dish) {
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

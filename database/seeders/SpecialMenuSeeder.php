<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specials = [
            [
                'title' => 'Комплексный обед №1 / Set lunch №1',
                'description' => 'Салат Витаминный / Salad, Борщ / Soup, Куриная котлета в панировке с гарниром / Chicken patty-burger with side dish, Компот клубничный / Homemade strawberry drink',
                'price' => 229,
                'cuisine_id' => 'RUS',
                'category_id'=> 'SPECIAL',
                'active' => true,
                'image' => 'menu-images/soup-borch.jpeg'
            ],
            [
                'title' => 'Комплексный обед №2 / Set lunch №2',
                'description' => 'Салат Витаминный / Salad, Суп куриный / Checken Soup, Стейк из курицы с гарниром / Chicken steak with side dish, Компот клубничный / Homemade strawberry drink',
                'price' => 229,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SPECIAL',
                'active' => true,
                'image' => 'menu-images/special-01.jpg'
            ],
            [
                'title' => 'Комплексный обед №1 / Set lunch №1',
                'description' => 'Салат Витаминный / Salad, Борщ / Soup, Куриная котлета в панировке с гарниром / Chicken patty-burger with side dish, Компот клубничный / Homemade strawberry drink',
                'price' => 229,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SPECIAL',
                'active' => true,
                'image' => 'menu-images/special-01.jpg'
            ],
            [
                'title' => 'Американский завтрак №1 / American breakfast №1',
                'description' => 'Жареные яйца / Fried egg, Тост / Toast, Ветчина и сосиски/ Ham and sausages',
                'price' => 150,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SPECIAL',
                'active' => true,
                'image' => 'menu-images/special-american.jpg'
            ],
        ];
        foreach ($specials as $dish) {
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

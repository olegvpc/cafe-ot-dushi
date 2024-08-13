<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoupMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $soups = [
            [
                'title' => 'Борщ / Russian beetroot soup',
                'description' => 'Вкусный и полезный суп.',
                'price' => 95,
                'cuisine_id' => 'RUS',
                'category_id'=> 'SOUP',
                'active' => true,
                'image' => 'menu-images/soup-borch.jpeg'
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
                'title' => 'Грибной крем суп / Mushroom cream soup',
                'description' => 'Оригинальный крем суп из местных грибов с азиатским акцентом',
                'price' => 110,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SOUP',
                'active' => true,
                'image' => 'menu-images/soup-mushroom.jpg'
            ],
            [
                'title' => 'Суп Том Кха / Tom kha kai soup',
                'description' => 'Кисло-острый суп на основе куриного бульона и кокосового молока с креветками, курицей, рыбой или другими морепродуктами',
                'price' => 150,
                'cuisine_id' => 'THAI',
                'category_id'=> 'SOUP',
                'active' => true,
                'image' => 'menu-images/soup-tom-kha.jpg'
            ],
        ];
        foreach ($soups as $dish) {
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

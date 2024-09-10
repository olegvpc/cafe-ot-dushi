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
        // images/no-image.jpeg
        $soups = [
            [
                'title' => 'Куриный бульен / Chicken broth / น้ำซุปไก่',
                'description' => 'Куриный бульен - Вкусный и полезный суп.',
                'price' => 95,
                'cuisine_id' => 'RUS',
                'category_id'=> 'SOUP',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Борщ / Russian beetroot soup / ซุปบีทรูท',
                'description' => 'Вкусный и полезный суп.',
                'price' => 95,
                'cuisine_id' => 'RUS',
                'category_id'=> 'SOUP',
                'active' => true,
                'image' => 'menu-images/soup-borch.jpg'
            ],
            [
                'title' => 'Куриный суп с лапшой / Chicken noodle soup / ก๋วยเตี๋ยวไก่',
                'description' => 'Вкусный суп на наваристом курином бульоне и итальянской лапше.',
                'price' => 90,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SOUP',
                'active' => true,
                'image' => 'menu-images/soup-chicken.jpg'
            ],
            [
                'title' => 'Рыбный суп / Fish soup / ซซุปปลา',
                'description' => 'Вкусный и полезный суп.',
                'price' => 90,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SOUP',
                'active' => false,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Окрошка на квасе или кефире / Okroshka with kvass or kefir',
                'description' => 'Традиционно русское блюдо. Отлично освежает в жаркую погоду',
                'price' => 95,
                'cuisine_id' => 'RUS',
                'category_id'=> 'SOUP',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Грибной крем суп / Mushroom cream soup / ซุปครีมเห็ด',
                'description' => 'Оригинальный крем суп из местных грибов с азиатским акцентом',
                'price' => 110,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SOUP',
                'active' => false,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Суп Том Ям куриный / Tom kha Yam chicken soup / ต้มยำไก่',
                'description' => 'Кисло-острый суп на основе куриного бульона и кокосового молока с курицей',
                'price' => 120,
                'cuisine_id' => 'THAI',
                'category_id'=> 'SOUP',
                'active' => true,
                'image' => 'menu-images/soup-tom-kha.jpg'
            ],
            [
                'title' => 'Суп Том Ям с креветками / Shrimp Tom kha Yam soup / ต้มข่ากุ้ง',
                'description' => 'Кисло-острый суп на основе куриного бульона и кокосового молока с креветками',
                'price' => 150,
                'cuisine_id' => 'THAI',
                'category_id'=> 'SOUP',
                'active' => true,
                'image' => 'menu-images/soup-tom-kha.jpg'
            ],
            [
                'title' => 'Суп Том Ям с морепродуктами / Shrimp Tom kha Yam soup / ต้มข่ากุ้ง',
                'description' => 'Кисло-острый суп на основе куриного бульона и кокосового молока с рыбой или другими морепродуктами',
                'price' => 150,
                'cuisine_id' => 'THAI',
                'category_id'=> 'SOUP',
                'active' => true,
                'image' => 'menu-images/soup-tom-kha.jpg'
            ],
            [
                'title' => 'Суп Том Кха куриный / Tom kha kai chicken soup / ต้มข่าไก่',
                'description' => 'Кисло-острый суп на основе куриного бульона и кокосового молока с курицей',
                'price' => 120,
                'cuisine_id' => 'THAI',
                'category_id'=> 'SOUP',
                'active' => true,
                'image' => 'menu-images/soup-tom-kha.jpg'
            ],
            [
                'title' => 'Суп Том Кха с креветками / Shrimp Tom Kha soup / ต้มข่ากุ้ง',
                'description' => 'Кисло-острый суп на основе куриного бульона и кокосового молока с креветками',
                'price' => 150,
                'cuisine_id' => 'THAI',
                'category_id'=> 'SOUP',
                'active' => true,
                'image' => 'menu-images/soup-tom-kha.jpg'
            ],
            [
                'title' => 'Суп Том Кха с морепродуктами / Tom Kha soup with seafood / ต้มข่าทะเล',
                'description' => 'Кисло-острый суп на основе куриного бульона и кокосового молока с рыбой или другими морепродуктами',
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

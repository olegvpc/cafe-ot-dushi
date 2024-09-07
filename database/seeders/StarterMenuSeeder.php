<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StarterMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // images/no-image.jpeg
        $starters = [
            [
                'title' => 'Хлеб / bread / ขนมปัง',
                'description' => 'Хлеб из оборной новозеландской муки',
                'price' => 10,
                'cuisine_id' => 'ALL',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Жареный рис с курицей / Fried rice with chicken / ข้าวผัดไก่',
                'description' => 'Классическое тайское блюдо - основа жизни',
                'price' => 100,
                'cuisine_id' => 'THAI',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Жареный рис со свининой / Fried rice with pork / ข้าวผัดหมู',
                'description' => 'Классическое тайское блюдо - основа жизни',
                'price' => 120,
                'cuisine_id' => 'THAI',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Жареный рис с креветками / Fried rice with shrimp / ข้าวผัดกุ้ง',
                'description' => 'Классическое тайское блюдо - основа жизни',
                'price' => 130,
                'cuisine_id' => 'THAI',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Жареный рис с морепродуктами / Fried rice with seafood / ข้าวผัดทะเล',
                'description' => 'Классическое тайское блюдо - основа жизни',
                'price' => 130,
                'cuisine_id' => 'THAI',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Креветки в кляре / Shrimp in batter / กุ้งในแป้ง',
                'description' => 'Классическое тайское блюдо - основа жизни',
                'price' => 150,
                'cuisine_id' => 'THAI',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Курица в кисло-сладком соусе / Chicken in sweet and sour sauce / ไก่ในซอสเปรี้ยวหวาน',
                'description' => 'Классическое тайское блюдо - основа жизни',
                'price' => 140,
                'cuisine_id' => 'THAI',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Соления (огурцы) / Pickles (cucumbers) / ผักดอง (แตงกวา)',
                'description' => 'Трационная русская закуска приготовленная с любовью тайским поваром',
                'price' => 60,
                'cuisine_id' => 'RUS',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Соления (помидоры) / Pickles (tomatoes) / ผักดอง (มะเขือเทศ)',
                'description' => 'Трационная русская закуска приготовленная с любовью тайским поваром',
                'price' => 60,
                'cuisine_id' => 'RUS',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Соления (капуста) / Pickles (cabbage) / ผักดอง (กะหล่ำปลี)',
                'description' => 'Трационная русская закуска приготовленная с любовью тайским поваром',
                'price' => 60,
                'cuisine_id' => 'RUS',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Соления микс / Pickles mix / ผักดองผสม',
                'description' => 'Трационная русская закуска приготовленная с любовью тайским поваром',
                'price' => 70,
                'cuisine_id' => 'RUS',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
        ];
        foreach ($starters as $dish) {
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

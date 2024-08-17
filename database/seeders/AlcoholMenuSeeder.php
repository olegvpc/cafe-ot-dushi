<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlcoholMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // menu-images/drinks-kompot.jpeg
        // images/no-image.jpeg
        $alcohols = [
            [
                'title' => 'Пиво Chang 0,6 / Beer Chang big / เบียร์ช้างใหญ่',
                'description' => 'Тайское пиво со слоном',
                'price' => 90,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/drink-beer-chang.jpeg'
            ],
            [
                'title' => 'Пиво Chang 0,3 / Beer Chang small / เบียร์ ลีโอ ใหญ่',
                'description' => 'Тайское пиво со слоном',
                'price' => 50,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/drink-beer-chang.jpeg'
            ],
            [
                'title' => 'Пиво Leo 0,6 / Beer Leo big',
                'description' => 'Тайское пиво c леопардом',
                'price' => 90,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/drink-beer-leo.jpeg'
            ],
            [
                'title' => 'Пиво Leo 0,3 / Beer Leo small / เบียร์ ลีโอ เล็ก',
                'description' => 'Тайское пиво c леопардом',
                'price' => 50,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/drink-beer-leo.jpeg'
            ],
            [
                'title' => 'Пиво Singha 0,6 / Beer Singha big / เบียร์สิงห์ใหญ่',
                'description' => 'Тайское пиво популярное',
                'price' => 100,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/drink-beer-singha.png'
            ],
            [
                'title' => 'Пиво Singha 0,3 / Beer Singha small / เบียร์สิงห์ตัวเล็ก',
                'description' => 'Тайское пиво популярное',
                'price' => 60,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/drink-beer-singha.png'
            ],
            [
                'title' => 'Ром Sang Som / Rum Sang Som / แสงโสม',
                'description' => 'Тайский ром любят все',
                'price' => 50,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/drink-rum-samsong.jpeg'
            ],

        ];
        foreach ($alcohols as $dish) {
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

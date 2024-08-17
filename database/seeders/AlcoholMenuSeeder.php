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
                'title' => 'Пиво Chang 0,6 / Beer Chang big',
                'description' => 'Тайское пиво со слоном',
                'price' => 90,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/.jpeg'
            ],
            [
                'title' => 'Пиво Chang 0,3 / Beer Chang small',
                'description' => 'Тайское пиво со слоном',
                'price' => 50,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/.jpeg'
            ],
            [
                'title' => 'Пиво Leo 0,6 / Beer Leo big',
                'description' => 'Тайское пиво c леопардом',
                'price' => 90,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/.jpeg'
            ],
            [
                'title' => 'Пиво Leo 0,3 / Beer Leo small',
                'description' => 'Тайское пиво c леопардом',
                'price' => 50,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/.jpeg'
            ],
            [
                'title' => 'Пиво Singha 0,6 / Beer Singha big',
                'description' => 'Тайское пиво популярное',
                'price' => 100,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/.jpeg'
            ],
            [
                'title' => 'Пиво Singha 0,3 / Beer Singha small',
                'description' => 'Тайское пиво популярное',
                'price' => 60,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/.jpeg'
            ],
            [
                'title' => 'Ром Sang Som / Rum Sang Som',
                'description' => 'Тайский ром любят все',
                'price' => 50,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/.jpeg'
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

<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class MainMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // images/no-image.jpeg
        $maines = [
            [
                'title' => 'Голубцы / Golubtsi (cabbage meat rolls)',
                'description' => 'Наши голубцы всем голубцам голубцы. Обязательно нужно попробовать',
                'price' => 130,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Куриный стейк с гарниром / Chicken stack',
                'description' => 'Классическая куриная грудка поджаренная до румяной корочки',
                'price' => 140,
                'cuisine_id' => 'ALL',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Куриные контлеты с гарниром / Chicken patty - burger with side dish',
                'description' => 'Классическая куриная котлета в панировке с гарниром на выбор',
                'price' => 120,
                'cuisine_id' => 'ALL',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-cotlet-pork.jpg'
            ],
            [
                'title' => 'Котлеты свиные с гарниром / Pork patty - burger with side dish',
                'description' => 'Классическая котлета из свинины в панировке с гарниром на выбор',
                'price' => 130,
                'cuisine_id' => 'ALL',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-cotlet-pork.jpg'
            ],
            [
                'title' => 'Жареный рис с криветками / Fried rice with shrimp',
                'description' => 'Жареный рис с креветками и овощами, по-тайски. Очень полезное и сытная еда',
                'price' => 110,
                'cuisine_id' => 'THAI',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-fried-rice-shrim.jpg'
            ],
        ];
        foreach ($maines as $dish) {
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

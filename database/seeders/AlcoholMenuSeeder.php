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
                'price' => 70,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/drink-beer-singha.png'
            ],
            [
                'title' => 'Пиво Chang Разливое 0,5 / Beer Chang draft big / เบียร์ช้าง ดราฟใหญ่',
                'description' => 'Пиво Chang Разливое 0,5 ',
                'price' => 90,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Вино белое Pter vella (150 gr) / White wine Pter vella / ไวน์ขาว',
                'description' => 'Вино белое Pter vella ',
                'price' => 130,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Вино белое Vina Toldos (150 gr) / White wine Vina Toldos / ไวน์ขาว',
                'description' => 'Вино белое Vina Toldos',
                'price' => 110,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Вино белое Vina Toldos (700 gr) / White wine Vina Toldos / ไวน์ขาว',
                'description' => 'Вино белое Vina Toldos - бутылка',
                'price' => 550,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Вино белое Diablos (150 gr) / White wine Diablos / ไวน์ขาว',
                'description' => 'Вино белое Diablos',
                'price' => 165,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Вино белое Diablos (700 gr) / White wine Diablos / ไวน์ขาว',
                'description' => 'Вино белое Diablos - бутылка',
                'price' => 800,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Вино розовое Meline (150 gr) / Rose wine Meline / ไวน์กุหลาบเมลีน',
                'description' => 'Вино розовое Meline',
                'price' => 165,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Вино розовое Meline (700 gr) / Rose wine Meline / ไวน์กุหลาบเมลีน',
                'description' => 'Вино розовое Meline - бутылка',
                'price' => 800,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Вино красное Le pettit Balthazar (150 gr) / Red wine Le pettit Balthazar / ไวน์แดง',
                'description' => 'Вино красное Le pettit Balthazar',
                'price' => 195,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Вино красное Le pettit Balthazar (700 gr) / Red wine Le pettit Balthazar / ไวน์แดง',
                'description' => 'Вино красное Le pettit Balthazar - бутылка',
                'price' => 975,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Вино красное Veneto (150 gr) / Red wine Veneto/ ไวน์แดง',
                'description' => 'Вино красное Veneto',
                'price' => 165,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Вино красное Veneto (700 gr) / Red wine Veneto / ไวน์แดง',
                'description' => 'Вино красное Veneto - бутылка',
                'price' => 800,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Ром Sang Som (100 gr)/ Rum Sang Som / แสงโสม',
                'description' => 'Тайский ром любят все',
                'price' => 90,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'menu-images/drink-rum-samsong.jpeg'
            ],
            [
                'title' => 'Виски Hang Thong (100 gr)/ Hang Thong Whiskey / หางทองวิสกี้',
                'description' => 'Тайский Виски- нужно пробовать',
                'price' => 90,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Ballantines whisky (100 gr)/ Ballantines whisky / วิสกี้บัลแลนไทน์',
                'description' => 'Шотланский Виски- классика',
                'price' => 180,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Водка Кулов/ Vodka Kulov / วอดก้า',
                'description' => 'Русская водка',
                'price' => 90,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => false,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Мохито алкогольный / Mojito alcoholic / โมฮิโต้แอลกอฮอล์',
                'description' => 'Кубинский знаменитый мохито',
                'price' => 150,
                'cuisine_id' => 'ALL',
                'category_id'=> 'ALCOHOL',
                'active' => false,
                'image' => 'images/no-image.jpeg'
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

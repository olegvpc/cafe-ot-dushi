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
                'title' => 'Куриный стейк с гарниром / Chicken stack / กองไก่',
                'description' => 'Классическая куриная грудка поджаренная до румяной корочки',
                'price' => 140,
                'cuisine_id' => 'ALL',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Куриные контлеты с гарниром / Chicken patty-burger with side dish / ไก่คอตเล็ตพร้อมเครื่องเคียง',
                'description' => 'Классическая куриная котлета в панировке с гарниром на выбор',
                'price' => 120,
                'cuisine_id' => 'ALL',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-cotlet-pork.jpg'
            ],
            [
                'title' => 'Котлеты свиные с гарниром / Pork patty-burger with side dish / หมูทอดพร้อมเครื่องเคียง',
                'description' => 'Классическая котлета из свинины в панировке с гарниром на выбор',
                'price' => 130,
                'cuisine_id' => 'ALL',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-cotlet-pork.jpg'
            ],
            [
                'title' => 'Куриная печень с гарниром / Chicken liver with garnish / ตับไก่พร้อมเครื่องปรุง',
                'description' => 'Классическая куриная печенка в соусе с гарниром на выбор',
                'price' => 150,
                'cuisine_id' => 'ALL',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-chicken-liver.jpg'
            ],
            [
                'title' => 'Пельмени со свининой / Dumplings with pork / เกี๊ยวหมู',
                'description' => 'Наши сибирские пельмни. Обязательно нужно попробовать. Можно попросить с бульеном',
                'price' => 130,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-pilmeni-pork.jpg'
            ],
            [
                'title' => 'Пельмени с курицей / Dumplings with chicken / เกี๊ยวกับไก่',
                'description' => 'Наши сибирские пельмни. Обязательно нужно попробовать. Можно попросить с бульеном',
                'price' => 120,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-pilmeni.jpg'
            ],
            [
                'title' => 'Жареный рис с криветками / Fried rice with shrimp / ข้าวผัดกุ้ง',
                'description' => 'Жареный рис с креветками и овощами, по-тайски. Очень полезное и сытная еда',
                'price' => 110,
                'cuisine_id' => 'THAI',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-fried-rice-shrim.jpg'
            ],
            [
                'title' => 'Голубцы / Golubtsi (cabbage meat rolls) / โกลุบซี',
                'description' => 'Наши голубцы всем голубцам голубцы. Обязательно нужно попробовать',
                'price' => 130,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Паста Карбонаре / Pasta Carbonare with bacon / พาสต้าคาร์โบนาเร่กับเบคอน',
                'description' => 'Знаменитое блюдо Италии с сыром пармезан',
                'price' => 110,
                'cuisine_id' => 'ALL',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-pasta-carbonare.jpg'
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

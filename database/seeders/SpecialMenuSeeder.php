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
        // images/no-image.jpeg
        $specials = [
            [
                'title' => 'Английский завтрак / English breakfast / อาหารเช้าแบบอังกฤษ',
                'description' => '<ul><li>Жареные яйца / Fried egg</li><li>Тост / Toast</li><li>Ветчина и сосиски/ Ham and sausages</li><li>Картошка фри / French fries</li><li>Напиток / Drink</li></ul>',
                'price' => 150,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SPECIAL',
                'active' => true,
                'image' => 'menu-images/special-english.jpg'
            ],
            [
                'title' => 'Американский завтрак / American breakfast / อาหารเช้าแบบอเมริกัน',
                'description' => '<ul><li>Жареные яйца / Fried egg</li><li>Тост / Toast</li><li>Ветчина и сосиски/ Ham and sausages</li><li>Напиток / Drink</li></ul>',
                'price' => 150,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SPECIAL',
                'active' => true,
                'image' => 'menu-images/special-american.jpg'
            ],
            [
                'title' => 'Русский завтрак / Russian breakfast / อาหารเช้าแบบรัสเซีย',
                'description' => '<ul><li>Жареные яйца / Fried egg</li><li>Лук / Onion</li><li>Помидоры / Tomatos</li><li>Напиток / Drink</li></ul>',
                'price' => 100,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SPECIAL',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Комплексный обед №1 / Set lunch №1 / ชุดอาหารกลางวัน 1',
                'description' => '<ul><li>Салат Витаминный / Salad</li><li>Борщ / Soup</li><li>Куриная котлета в панировке с гарниром / Chicken patty-burger with side dish</li><li>Компот клубничный / Homemade strawberry drink</li></ul>',
                'price' => 229,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SPECIAL',
                'active' => true,
                'image' => 'menu-images/special-01.jpg'
            ],
            [
                'title' => 'Комплексный обед №2 / Set lunch №2 / ชุดอาหารกลางวัน 2',
                'description' => '<ul><li>Салат Витаминный / Salad</li><li>Суп куриный / Checken Soup</li><li>Стейк из курицы с гарниром / Chicken steak with side dish</li><li>Компот клубничный / Homemade strawberry drink</li></ul>',
                'price' => 229,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SPECIAL',
                'active' => true,
                'image' => 'menu-images/special-02.jpg'
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

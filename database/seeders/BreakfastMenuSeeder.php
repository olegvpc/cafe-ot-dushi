<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreakfastMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // images/no-image.jpeg
        $specials = [
            [
                'title' => 'Овсянка / Oatmeal / ข้าวโอ๊ต',
                'description' => 'Классическая овсянка',
                'price' => 75,
                'cuisine_id' => 'ALL',
                'category_id'=> 'BREAKFAST',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Овсянка с фруктами / Oatmeal with fruit / ข้าวโอ๊ตกับผลไม้',
                'description' => 'Классическая овсянка с фруктами (манго и банан)',
                'price' => 100,
                'cuisine_id' => 'ALL',
                'category_id'=> 'BREAKFAST',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Английский завтрак / English breakfast / อาหารเช้าแบบอังกฤษ',
                'description' => '<ul><li>Жареные яйца / Fried egg</li><li>Тост / Toast</li><li>Ветчина и сосиски/ Ham and sausages</li><li>Картошка фри / French fries</li><li>Напиток / Drink</li></ul>',
                'price' => 150,
                'cuisine_id' => 'ALL',
                'category_id'=> 'BREAKFAST',
                'active' => true,
                'image' => 'menu-images/special-english.jpg'
            ],
            [
                'title' => 'Американский завтрак / American breakfast / อาหารเช้าแบบอเมริกัน',
                'description' => '<ul><li>Жареные яйца / Fried egg</li><li>Тост / Toast</li><li>Ветчина и сосиски/ Ham and sausages</li><li>Напиток / Drink</li></ul>',
                'price' => 150,
                'cuisine_id' => 'ALL',
                'category_id'=> 'BREAKFAST',
                'active' => false,
                'image' => 'menu-images/special-american.jpg'
            ],
            [
                'title' => 'Русский завтрак / Russian breakfast / อาหารเช้าแบบรัสเซีย',
                'description' => '<ul><li>Жареные яйца / Fried egg</li><li>Лук / Onion</li><li>Помидоры / Tomatos</li><li>Напиток / Drink</li></ul>',
                'price' => 100,
                'cuisine_id' => 'ALL',
                'category_id'=> 'BREAKFAST',
                'active' => true,
                'image' => 'menu-images/special-russian.jpg'
            ],
            [
                'title' => 'Блины (сгущенка, джем, шоколад) / Pancakes (condensed milk, jam, chocolate) / แพนเค้ก',
                'description' => 'Блины (сгущенка, джем, шоколад)',
                'price' => 90,
                'cuisine_id' => 'ALL',
                'category_id'=> 'BREAKFAST',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Блины с ветчиной и сыром / Pancakes with ham and cheese / แพนเค้กกับแฮมและชีส',
                'description' => 'Блины с ветчиной и сыром',
                'price' => 120,
                'cuisine_id' => 'ALL',
                'category_id'=> 'BREAKFAST',
                'active' => true,
                'image' => 'menu-images/starters-pancakes-hum.jpg'
            ],
            [
                'title' => 'Блины с курицей / Pancakes with chicken / แพนเค้กกับไก่',
                'description' => 'Блины с курицей',
                'price' => 120,
                'cuisine_id' => 'ALL',
                'category_id'=> 'BREAKFAST',
                'active' => true,
                'image' => 'menu-images/starters-pancakes-chicken.jpg'
            ],
            [
                'title' => 'Блины с мясом (свинина) / Pancakes with pork / แพนเค้กหมู',
                'description' => 'Блины с мясом (свинина)',
                'price' => 120,
                'cuisine_id' => 'ALL',
                'category_id'=> 'BREAKFAST',
                'active' => true,
                'image' => 'menu-images/starters-pancakes-chicken.jpg'
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

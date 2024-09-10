<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaladMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // images/no-image.jpeg
        $salads = [
            [
                'title' => 'Витиминный салат / Green salad / สลัดผักสด',
                'description' => 'Закусочный салат для ЗОЖ',
                'price' => 80,
                'cuisine_id' => 'RUS',
                'category_id'=> 'SALAD',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Морковный салат / Carrot salad / สลัดแครอท',
                'description' => 'Закусочный салат для ЗОЖ',
                'price' => 80,
                'cuisine_id' => 'RUS',
                'category_id'=> 'SALAD',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Овощной салат / Vegetable salad / สลัดผัก',
                'description' => 'Закусочный салат для ЗОЖ - огурцы, помидоры',
                'price' => 90,
                'cuisine_id' => 'RUS',
                'category_id'=> 'SALAD',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Салат Оливье/ Olivie salad / สลัดโอลิเวีย',
                'description' => 'Закусочный салат русской кухни из отварных корнеплодов, солёных огурцов, яиц с мясом или варёной колбасой в майонезной заправке.',
                'price' => 80,
                'cuisine_id' => 'RUS',
                'category_id'=> 'SALAD',
                'active' => true,
                'image' => 'menu-images/salad-olivie.jpeg'
            ],
            [
                'title' => 'Салат из курицы / Chicken salad / สลัดไก่',
                'description' => 'Салаты из курицы содержат очень много белка, а значит, их можно есть даже вечером.',
                'price' => 100,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SALAD',
                'active' => true,
                'image' => 'menu-images/salad-chicken.jpg'
            ],
            [
                'title' => 'Селедочка под шубой / Herring under a fur coat / แฮร์ริ่ง',
                'description' => 'Знаменитый новогодний салат',
                'price' => 140,
                'cuisine_id' => 'RUS',
                'category_id'=> 'SALAD',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Салат с тунцом / Tuna salad / สลัดทูน่า',
                'description' => 'Салат с тунцом',
                'price' => 120,
                'cuisine_id' => 'RUS',
                'category_id'=> 'SALAD',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Папая салат Som Tam / Papaya salad Som Tam / ส้มตำ',
                'description' => 'Классический тайский салат',
                'price' => 80,
                'cuisine_id' => 'THAI',
                'category_id'=> 'SALAD',
                'active' => true,
                'image' => 'menu-images/salad-papaya.jpeg'
            ],
            [
                'title' => 'Салат Пад-Тай / Pad-Thai salad / สลัดผัดไทย',
                'description' => 'Классический тайский салат на основе рисовой лапши',
                'price' => 120,
                'cuisine_id' => 'THAI',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/salad-pad-thai.jpg'
            ],
            [
                'title' => 'Салат из крабовых палочек / Crab-sticks salad / สลัดปูอัด',
                'description' => 'Салат из крабовых палочек с кукурузой, рисом и вареными яйцами - вкусная и очень популярная закуска.',
                'price' => 95,
                'cuisine_id' => 'ALL',
                'category_id'=> 'SALAD',
                'active' => true,
                'image' => 'menu-images/salad-crab-sticks.jpg'
            ],
            [
                'title' => 'Салат с морепродуктами / Seafood salad / สลัดทะเล',
                'description' => 'Салат с тунцом',
                'price' => 150,
                'cuisine_id' => 'RUS',
                'category_id'=> 'SALAD',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
        ];
        foreach ($salads as $dish) {
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

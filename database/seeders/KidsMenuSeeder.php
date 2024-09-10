<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KidsMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // images/no-image.jpeg
        $burgers = [
            [
                'title' => 'Хот Дог / Hot Dog / ฮอทดอก',
                'description' => 'Хот Дог.',
                'price' => 100,
                'cuisine_id' => 'ALL',
                'category_id'=> 'KIDS',
                'active' => false,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Клаб сэндвич с ветчиной / Club sandwich with ham / คลับแซนด์วิชกับแฮม',
                'description' => 'Клаб сэндвич с ветчиной.',
                'price' => 120,
                'cuisine_id' => 'ALL',
                'category_id'=> 'KIDS',
                'active' => false,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Клаб сэндвич с курицей / Chicken club sandwich / คลับแซนด์วิชไก่',
                'description' => 'Клаб сэндвич с курицей.',
                'price' => 120,
                'cuisine_id' => 'ALL',
                'category_id'=> 'KIDS',
                'active' => false,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Гамбургер с курицей и картошка фри / Chicken burger and fries / เบอร์เกอร์ไก่และมันฝรั่งทอด',
                'description' => 'Гамбургер с курицей и картошка фри.',
                'price' => 130,
                'cuisine_id' => 'ALL',
                'category_id'=> 'KIDS',
                'active' => false,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Гамбургер с рыбой и картошка фри / Hamburger with fish and fries / แฮมเบอร์เกอร์กับปลาและมันฝรั่งทอด',
                'description' => 'Гамбургер с рыбой и картошка фри.',
                'price' => 140,
                'cuisine_id' => 'ALL',
                'category_id'=> 'KIDS',
                'active' => false,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Гамбургер со свининой и картошка фри / Pork burger and fries / เบอร์เกอร์หมูและมันฝรั่งทอด',
                'description' => 'Гамбургер со свининой и картошка фри.',
                'price' => 140,
                'cuisine_id' => 'ALL',
                'category_id'=> 'KIDS',
                'active' => false,
                'image' => 'images/no-image.jpeg'
            ],

        ];
        foreach ($burgers as $dish) {
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

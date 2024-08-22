<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DissertMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // images/no-image.jpeg
        $disserts = [
            [
                'title' => 'Пирожное Картошка / Potato cake / เค้กมันฝรั่ง',
                'description' => 'Кондитерские изделия изготовлены московским кондитером, проживающим в Паттае.',
                'price' => 60,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DISSERT',
                'active' => true,
                'image' => 'menu-images/dissert-potato.jpg'
            ],
            [
                'title' => 'Песочные кольца / Ring cake / เค้กแหวน',
                'description' => 'Кондитерские изделия изготовлены московским кондитером, проживающим в Паттае.',
                'price' => 40,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DISSERT',
                'active' => true,
                'image' => 'menu-images/dissert-ring.jpg'
            ],
            [
                'title' => 'Пирожное Муравейник / Muraveinik cake / เค้กมูราวีนิก',
                'description' => 'Кондитерские изделия изготовлены московским кондитером, проживающим в Паттае.',
                'price' => 60,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DISSERT',
                'active' => true,
                'image' => 'menu-images/dissert-ant.jpg'
            ],
            [
                'title' => 'Трубочка со сгущенкой / Tube with condensed milk / หลอดใส่นมข้น',
                'description' => 'Кондитерские изделия изготовлены московским кондитером, проживающим в Паттае.',
                'price' => 40,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DISSERT',
                'active' => true,
                'image' => 'menu-images/dissert-tube.jpg'
            ],
            [
                'title' => 'Трайфл Сникерс / Trifle Snickers / สนิกเกอร์เรื่องเล็ก',
                'description' => 'Кондитерские изделия изготовлены московским кондитером, проживающим в Паттае.',
                'price' => 99,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DISSERT',
                'active' => true,
                'image' => 'menu-images/dissert-snikers.jpg'
            ],
            [
                'title' => 'Трайфл Наполеон / Trifle Napoleon / เรื่องเล็กนโปเลียน',
                'description' => 'Кондитерские изделия изготовлены московским кондитером, проживающим в Паттае.',
                'price' => 99,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DISSERT',
                'active' => true,
                'image' => 'menu-images/dissert-napoleon.jpg'
            ],
            [
                'title' => 'Трайфл Панакота / Trifle Panakota / ปานาโกต้า',
                'description' => 'Кондитерские изделия изготовлены московским кондитером, проживающим в Паттае.',
                'price' => 99,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DISSERT',
                'active' => true,
                'image' => 'menu-images/dissert-panakota.jpg'
            ],
        ];
        foreach ($disserts as $dish) {
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

<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DrinkMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Users/olegvpc/otdushi/cafe-ot-dushi/storage/app/public/menu-images/drinks-kompot.jpeg
        // images/no-image.jpeg
        $drinks = [
            [
                'title' => 'Компот из клубники / Strawberry compote',
                'description' => 'Сваренный по сибирскому рецепту с добавлением секретного ингридиента',
                'price' => 30,
                'cuisine_id' => 'RUS',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drinks-kompot.jpeg'
            ],
            [
                'title' => 'Айран / Airan',
                'description' => 'Хорошо уталяет жажду}',
                'price' => 30,
                'cuisine_id' => 'RUS',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drinks-airan.jpeg'
            ],
        ];
        foreach ($drinks as $dish) {
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

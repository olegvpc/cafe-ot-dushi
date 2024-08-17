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
        // menu-images/drinks-kompot.jpeg
        // images/no-image.jpeg
        $drinks = [
            [
                'title' => 'Компот из клубники / Strawberry compote / เครื่องดื่มสตรอเบอร์รี่',
                'description' => 'Сваренный по сибирскому рецепту с добавлением секретного ингридиента',
                'price' => 30,
                'cuisine_id' => 'RUS',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drinks-kompot.jpeg'
            ],
            [
                'title' => 'Айран / Airan',
                'description' => 'Хорошо уталяет жажду',
                'price' => 30,
                'cuisine_id' => 'RUS',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drinks-airan.jpeg'
            ],
            [
                'title' => 'Кола / Coca-Cola / โคคา-โคลา',
                'description' => 'Отличный прохладительный напиток',
                'price' => 30,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Фанта / Fanta / แฟนต้า',
                'description' => 'Отличный прохладительный напиток',
                'price' => 30,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Спрайт / Sprite / เทพดา',
                'description' => 'Отличный прохладительный напиток',
                'price' => 30,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Вода / Water / น้ำ',
                'description' => 'Отличный прохладительный напиток',
                'price' => 20,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Сок яблочный / Apple juice / น้ำแอปเปิ้ล',
                'description' => 'Отличный прохладительный напиток',
                'price' => 30,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Сок апельсиновый / Orange juice / น้ำส้ม',
                'description' => 'Отличный прохладительный напиток',
                'price' => 30,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Сок ананасовый / Pineapple juice / น้ำสับปะรด',
                'description' => 'Отличный прохладительный напиток',
                'price' => 30,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'images/no-image.jpeg'
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

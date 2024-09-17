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
                'title' => 'Шейк манго / Mango shake / มะม่วงปั่น',
                'description' => 'Шейк из натуральных фруктов',
                'price' => 60,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-shake-mango.jpeg'
            ],
            [
                'title' => 'Шейк Арбузный / Watermelon shake / แตงโมปั่น',
                'description' => 'Шейк из натуральных фруктов',
                'price' => 60,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-shake-watermelon.jpeg'
            ],
            [
                'title' => 'Шейк ананасовый / Pineapple shake / สับปะรดปั่น',
                'description' => 'Шейк из натуральных фруктов',
                'price' => 60,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-shake-pinapple.jpeg'
            ],
            [
                'title' => 'Компот из клубники / Strawberry compote / เครื่องดื่มสตรอเบอร์รี่',
                'description' => 'Сваренный по сибирскому рецепту с добавлением секретного ингридиента',
                'price' => 30,
                'cuisine_id' => 'RUS',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-kompot.jpg'
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
                'image' => 'menu-images/drink-cola.jpeg'
            ],
            [
                'title' => 'Фанта / Fanta / แฟนต้า',
                'description' => 'Отличный прохладительный напиток',
                'price' => 30,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-fanta.jpeg'
            ],
            [
                'title' => 'Спрайт / Sprite / เทพดา',
                'description' => 'Отличный прохладительный напиток',
                'price' => 30,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-sprite.jpeg'
            ],
            [
                'title' => 'Вода / Water / น้ำ',
                'description' => 'Отличный прохладительный напиток',
                'price' => 30,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-water.jpeg'
            ],
            [
                'title' => 'Сок яблочный / Apple juice / น้ำแอปเปิ้ล',
                'description' => 'Отличный прохладительный напиток',
                'price' => 30,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-apple.jpeg'
            ],
            [
                'title' => 'Сок апельсиновый / Orange juice / น้ำส้ม',
                'description' => 'Отличный прохладительный напиток',
                'price' => 30,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-orange.jpeg'
            ],
            [
                'title' => 'Сок ананасовый / Pineapple juice / น้ำสับปะรด',
                'description' => 'Отличный прохладительный напиток',
                'price' => 30,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-pinapple.jpeg'
            ],
            [
                'title' => 'Чай кружка / Tea mug / แก้วน้ำชา',
                'description' => 'Горячий чай',
                'price' => 20,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-tee-cup.jpeg'
            ],
            [
                'title' => 'Чай заварник / Tea kettle / กาน้ำชา',
                'description' => 'Горячий чай',
                'price' => 50,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-tea-pot.jpeg'
            ],
            [
                'title' => 'Кофе американо горячий / Hot americano coffee / กาแฟอเมริกาโน่ร้อน',
                'description' => 'Горячий американо сваренный из тайландского кофе в итальянской кефе-машине',
                'price' => 50,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-coffee-americano.jpeg'
            ],
            [
                'title' => 'Кофе эспрессо горячий / Hot espresso coffee / กาแฟเอสเพรสโซ่ร้อน',
                'description' => 'Горячий эспрессо сваренный из тайландского кофе в итальянской кефе-машине',
                'price' => 50,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-coffee-espresso.jpeg'
            ],
            [
                'title' => 'Кофе латте горячий / Hot latte coffee / กาแฟลาเต้ร้อน',
                'description' => 'Горячий латте сваренный из тайландского кофе в итальянской кефе-машине',
                'price' => 50,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-coffee-latte.jpeg'
            ],
            [
                'title' => 'Кофе капучино горячий / Hot cappuccino coffee / กาแฟคาปูชิโน่ร้อน',
                'description' => 'Горячий капучино сваренный из тайландского кофе в итальянской кефе-машине',
                'price' => 50,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-cofe-capuchino.jpg'
            ],
            [
                'title' => 'Кофе холодный / Cold coffee / กาแฟเย็น',
                'description' => 'Холодный кофе сваренный из тайландского кофе в итальянской кефе-машине',
                'price' => 60,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-coffee-ice.jpeg'
            ],
            [
                'title' => 'Мохито безалкогольный / Mojito non-alcoholic / โมฮิโต้ไม่มีแอลกอฮอล์',
                'description' => 'Кубинский знаменитый мохито',
                'price' => 150,
                'cuisine_id' => 'ALL',
                'category_id'=> 'DRINK',
                'active' => true,
                'image' => 'menu-images/drink-mokhito2.jpeg'
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

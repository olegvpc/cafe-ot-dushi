<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StarterMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // images/no-image.jpeg
        $starters = [
            [
                'title' => 'Хлеб / bread / ขนมปัง',
                'description' => 'Хлеб из оборной новозеландской муки',
                'price' => 10,
                'cuisine_id' => 'ALL',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'menu-images/starters-bread.jpeg'
            ],
            [
                'title' => 'Луковые кольца во фритюре / Deep fried onion rings / หัวหอมทอด',
                'description' => 'Луковые кольца во фритюре',
                'price' => 90,
                'cuisine_id' => 'ALL',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Морепродукты в кляре / Seafood in batter / อาหารทะเลในแป้ง',
                'description' => 'Морепродукты в кляре',
                'price' => 180,
                'cuisine_id' => 'ALL',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Жареные креветки с чесноком / Fried shrimp with garlic / กุ้งผัดกระเทียม',
                'description' => 'Жареные креветки с чесноком',
                'price' => 180,
                'cuisine_id' => 'ALL',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'menu-images/salad-fried-sromp-garlic.jpg'
            ],
            [
                'title' => 'Вареные креветки / Boiled shrimp / กุ้งต้ม',
                'description' => 'Вареные креветки',
                'price' => 160,
                'cuisine_id' => 'ALL',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'menu-images/starters-shrimp-boiled.jpeg'
            ],
            [
                'title' => 'Креветки в кляре / Shrimp in batter / กุ้งในแป้ง',
                'description' => 'Классическое тайское блюдо - основа жизни',
                'price' => 180,
                'cuisine_id' => 'THAI',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'menu-images/starters-shrimp-in-tempura.jpg'
            ],
            [
                'title' => 'Курица в кисло-сладком соусе / Chicken in sweet and sour sauce / ไก่ในซอสเปรี้ยวหวาน',
                'description' => 'Классическое тайское блюдо - основа жизни',
                'price' => 150,
                'cuisine_id' => 'THAI',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Соления (огурцы) / Pickles (cucumbers) / ผักดอง (แตงกวา)',
                'description' => 'Трационная русская закуска приготовленная с любовью тайским поваром',
                'price' => 80,
                'cuisine_id' => 'RUS',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'menu-images/starters-cucember.jpeg'
            ],
            [
                'title' => 'Соления (помидоры) / Pickles (tomatoes) / ผักดอง (มะเขือเทศ)',
                'description' => 'Трационная русская закуска приготовленная с любовью тайским поваром',
                'price' => 80,
                'cuisine_id' => 'RUS',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'menu-images/starters-tomato.jpeg'
            ],
            [
                'title' => 'Соления (капуста) / Pickles (cabbage) / ผักดอง (กะหล่ำปลี)',
                'description' => 'Трационная русская закуска приготовленная с любовью тайским поваром',
                'price' => 80,
                'cuisine_id' => 'RUS',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'menu-images/starters-garbage.jpeg'
            ],
            [
                'title' => 'Соления микс / Pickles mix / ผักดองผสม',
                'description' => 'Трационная русская закуска приготовленная с любовью тайским поваром',
                'price' => 80,
                'cuisine_id' => 'RUS',
                'category_id'=> 'STARTER',
                'active' => true,
                'image' => 'images/no-image.jpeg'
            ],
        ];
        foreach ($starters as $dish) {
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

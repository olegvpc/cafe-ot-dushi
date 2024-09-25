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
                'title' => 'Вареники с капустой / Dumplings with cabbage / เกี๊ยวกับกะหล่ำปลี',
                'description' => 'Вареники: Классическое русское бдюдо изветное во всм мире',
                'price' => 110,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-varenik-cabbage.jpg'
            ],
            [
                'title' => 'Вареники с картофелем / Dumplings with potatoes / เกี๊ยวกับมันฝรั่ง',
                'description' => 'Вареники: Классическое русское бдюдо изветное во всм мире',
                'price' => 110,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-varenik-patato.jpg'
            ],
            [
                'title' => 'Вареники с картофелем и грибами / Dumplings with potatoes and mushrooms / เกี๊ยวกับมันฝรั่งและเห็ด',
                'description' => 'Вареники: Классическое русское бдюдо изветное во всм мире',
                'price' => 130,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-varenik-patato.jpg'
            ],
            [
                'title' => 'Вареники с клубникой / Dumplings with strawberries / เกี๊ยวกับสตรอเบอร์รี่',
                'description' => 'Вареники: Классическое русское бдюдо изветное во всм мире',
                'price' => 180,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => false,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Вареники с творогом / Dumplings with cottage cheese / เกี๊ยวกับคอทเทจชีส',
                'description' => 'Вареники: Классическое русское бдюдо изветное во всм мире',
                'price' => 180,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => false,
                'image' => 'menu-images/main-varenik-patato-cheese.jpg'
            ],
            [
                'title' => 'Жареный рис с курицей / Fried rice with chicken / ข้าวผัดไก่',
                'description' => 'Классическое тайское блюдо - основа жизни',
                'price' => 120,
                'cuisine_id' => 'THAI',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-fried-rice-chicken.jpeg'
            ],
            [
                'title' => 'Жареный рис со свининой / Fried rice with pork / ข้าวผัดหมู',
                'description' => 'Классическое тайское блюдо - основа жизни',
                'price' => 120,
                'cuisine_id' => 'THAI',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-fried-rice-pork.jpeg'
            ],
            [
                'title' => 'Жареный рис с креветками / Fried rice with shrimp / ข้าวผัดกุ้ง',
                'description' => 'Классическое тайское блюдо - основа жизни',
                'price' => 150,
                'cuisine_id' => 'THAI',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-fried-rice-shrim.jpg'
            ],
            [
                'title' => 'Жареный рис с морепродуктами / Fried rice with seafood / ข้าวผัดทะเล',
                'description' => 'Классическое тайское блюдо - основа жизни',
                'price' => 150,
                'cuisine_id' => 'THAI',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-fried-rice-seafood.jpeg'
            ],
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
                'price' => 140,
                'cuisine_id' => 'ALL',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-cotlet-pork.jpg'
            ],
            [
                'title' => 'Котлеты свиные с гарниром / Pork patty-burger with side dish / หมูทอดพร้อมเครื่องเคียง',
                'description' => 'Классическая котлета из свинины в панировке с гарниром на выбор',
                'price' => 150,
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
                'title' => 'Рис в ананасе / Rice in pineapple / ข้าวในสับปะรด',
                'description' => 'Рис в ананасе: тайское блюдо',
                'price' => 190,
                'cuisine_id' => 'THAI',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-rice-pinapple.jpeg'
            ],
            [
                'title' => 'Пельмени с курицей / Dumplings with chicken / เกี๊ยวกับไก่',
                'description' => 'Наши сибирские пельмни. Обязательно нужно попробовать. Можно попросить с бульеном',
                'price' => 130,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-pilmeni.jpg'
            ],
            [
                'title' => 'Пельмени со свининой / Dumplings with pork / เกี๊ยวหมู',
                'description' => 'Наши сибирские пельмни. Обязательно нужно попробовать. Можно попросить с бульеном',
                'price' => 140,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-pilmeni-pork.jpg'
            ],
            [
                'title' => 'Голубцы / Golubtsi (cabbage meat rolls) / โกลุบซี',
                'description' => 'Наши голубцы всем голубцам голубцы. Обязательно нужно попробовать',
                'price' => 150,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-golubtsy.jpg'
            ],
            [
                'title' => 'Паста Карбонаре / Pasta Carbonare with bacon / พาสต้าคาร์โบนาเร่กับเบคอน',
                'description' => 'Знаменитое блюдо Италии с сыром пармезан',
                'price' => 160,
                'cuisine_id' => 'ALL',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-pasta-carbanare.jpg'
            ],
            [
                'title' => 'Жареное филе рыбы с гарниром / Fried fish fillet with garnish / เนื้อปลาทอดกับเครื่องปรุง',
                'description' => 'Жареная в кляре рыба пангасиус с гарниром на выбор',
                'price' => 160,
                'cuisine_id' => 'ALL',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-fish.jpg'
            ],
            [
                'title' => 'Куриное филе с ветчиной и сыром с гарниром / Chicken fillet with ham and cheese with garnish / เนื้อไก่กับแฮมและชีสพร้อมเครื่องปรุง',
                'description' => 'Куриное филе с ветчиной и сыром с гарниром на выбор',
                'price' => 180,
                'cuisine_id' => 'ALL',
                'category_id'=> 'MAIN',
                'active' => false,
                'image' => 'menu-images/main-chicken-hum.jpg'
            ],
            [
                'title' => 'Пад-Тай с креветками / Pad Thai with shrimp / ผัดไทยกุ้ง',
                'description' => 'Пад-Тай с креветками - классческое тайское блюдо',
                'price' => 190,
                'cuisine_id' => 'THAI',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-pad-thai-shrimp.jpg'
            ],
            [
                'title' => 'Пад-Тай со свининой / Pad Thai with pork / ผัดไทยหมู',
                'description' => 'Пад-Тай со свининой - классческое тайское блюдо',
                'price' => 150,
                'cuisine_id' => 'THAI',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-pad-thai-pork.jpeg'
            ],
            [
                'title' => 'Чебурек с курицей / Cheburek with chicken / กับไก่',
                'description' => 'Чебурек с курицей - классческое не тайское блюдо',
                'price' => 70,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-cheburek.jpeg'
            ],
            [
                'title' => 'Чебурек со свининой / Cheburek with pork / เชบูเร็กกับหมู',
                'description' => 'Чебурек со свининой - классческое не тайское блюдо',
                'price' => 90,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => true,
                'image' => 'menu-images/main-cheburek.jpeg'
            ],
            [
                'title' => 'Мидии в сырном соусе / Mussels in cheese sauce / หอยแมลงภู่ในซอสชีส',
                'description' => 'Мидийное место - Мидии в сырном соусе',
                'price' => 190,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => false,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Мидии в соусе том-ям / Mussels in tom yum sauce / หอยแมลงภู่ในซอสต้มยำ',
                'description' => 'Мидийное место - Мидии в соусе том-яме',
                'price' => 190,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => false,
                'image' => 'images/no-image.jpeg'
            ],
            [
                'title' => 'Мидии в грибном соусе / Mussels in mushroom sauce / หอยแมลงภู่ในซอสเห็ด',
                'description' => 'Мидийное место - Мидии в грибном соусе',
                'price' => 190,
                'cuisine_id' => 'RUS',
                'category_id'=> 'MAIN',
                'active' => false,
                'image' => 'images/no-image.jpeg'
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

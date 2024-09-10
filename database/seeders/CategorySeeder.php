<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => 'BREAKFAST',
                'name' => 'Завтраки / Breakfast / อาหารเช้า',
                'sort' => 500
            ],
            [
                'id' => 'SALAD',
                'name' => 'Салаты / Salad / สลัด',
                'sort' => 550
            ],
            [
                'id' => 'STARTER',
                'name' => 'Закуски / Starter / สตาร์ทเตอร์',
                'sort' => 600
            ],
            [
                'id' => 'SOUP',
                'name' => 'Супы / Soup / ซุป',
                'sort' => 650
            ],
            [
                'id' => 'MAIN',
                'created_at' => null,
                'name' => 'Главное блюдо / Main cource / อาหารจานหลัก',
                'sort' => 700
            ],
            [
                'id' => 'SPECIAL',
                'name' => 'Комплексные / Set / ชุด',
                'sort' => 750
            ],
            [
                'id' => 'GARNISH',
                'created_at' => null,
                'name' => 'Гарниры / Garnish / ตกแต่ง',
                'sort' => 800
            ],
            [
                'id' => 'DISSERT',
                'name' => 'Дессерт / Dissert / วิทยานิพนธ์',
                'sort' => 850
            ],
            [
                'id' => 'DRINK',
                'name' => 'Напитки / Drink/ เครื่องดื่ม',
                'sort' => 900
            ],
            [
                'id' => 'ALCOHOL',
                'name' => 'Алкоголь / Alcohol / แอลกอฮอล์',
                'sort' => 950
            ],
            [
                'id' => 'KIDS',
                'name' => 'Детское меню / Kids menu / เมนูเด็ก',
                'sort' => 999
            ],
        ];

        foreach ($categories as $category) {
            Category::query()->firstOrCreate([
                'id' => $category['id']
            ], [
                'name' => $category['name'],
                'sort'=>$category['sort'],
            ]);
        }
    }
}

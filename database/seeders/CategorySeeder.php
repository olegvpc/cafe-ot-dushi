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
                'sort' => 960
            ],
            [
                'id' => 'SPECIAL',
                'name' => 'Комплексные / Set / ชุด',
                'sort' => 970
            ],
            [
                'id' => 'BURGERS',
                'name' => 'Бургеры / Burgers / เบอร์เกอร์',
                'sort' => 975
            ],
            [
                'id' => 'SALAD',
                'name' => 'Салаты / Salad / สลัด',
                'sort' => 980
            ],
            [
                'id' => 'STARTER',
                'name' => 'Закуски / Starter / สตาร์ทเตอร์',
                'sort' => 985
            ],
            [
                'id' => 'SOUP',
                'name' => 'Супы / Soup / ซุป',
                'sort' => 987
            ],
            [
                'id' => 'MAIN',
                'created_at' => null,
                'name' => 'Главное блюдо / Main cource / อาหารจานหลัก',
                'sort' => 990
            ],
            [
                'id' => 'GARNISH',
                'created_at' => null,
                'name' => 'Гарниры / Garnish / ตกแต่ง',
                'sort' => 991
            ],
            [
                'id' => 'DRINK',
                'name' => 'Напитки / Drink/ เครื่องดื่ม',
                'sort' => 993
            ],
            [
                'id' => 'DISSERT',
                'name' => 'Дессерт / Dissert / วิทยานิพนธ์',
                'sort' => 995
            ],
            [
                'id' => 'ALCOHOL',
                'name' => 'Алкоголь / Alcohol / แอลกอฮอล์',
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

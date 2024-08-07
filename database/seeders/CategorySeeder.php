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
                'id' => 'DRINK',
                'created_at' => null,
                'name' => 'Напитки / Drink/ เครื่องดื่ม',
                'sort' => 991
            ],
            [
                'id' => 'SALAD',
                'created_at' => null,
                'name' => 'Салаты / Salad / สลัด',
                'sort' => 980
            ],
            [
                'id' => 'SOUP',
                'created_at' => null,
                'name' => 'Супы / Coup / ซุป',
                'sort' => 985
            ],
            [
                'id' => 'MAIN',
                'created_at' => null,
                'name' => 'Главное блюдо / Main cource / อาหารจานหลัก',
                'sort' => 990
            ],
            [
                'id' => 'ALCOHOL',
                'created_at' => null,
                'name' => 'Алкоголь / Alcohol / แอลกอฮอล์',
                'sort' => 999
            ],
        ];

        foreach ($categories as $category) {
            Category::query()->firstOrCreate([
                'id' => $category['id']
            ], [
                'name' => $category['name'],
                'created_at' => new Carbon(now()),
                'sort'=>$category['sort'],
            ]);
        }
    }
}

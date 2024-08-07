<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cuisines = [
            [
                'id' => 'ALL',
                'created_at' => null,
                'name' => 'Интернациональная / International /อาหารนานาชาติ',
                'sort' => 800
            ],
            [
                'id' => 'RUS',
                'created_at' => null,
                'name' => 'Русская кухня / Russian cuisine / อาหารรัสเซีย',
                'sort' => 850
            ],
            [
                'id' => 'THAI',
                'created_at' => null,
                'name' => 'Тайская кухня / Thai cuisine / อาหารไทย',
                'sort' => 900
            ],
        ];
        foreach ($cuisines as $cuisine) {
            Cuisine::query()->firstOrCreate([
                'id' => $cuisine['id']
            ], [
                'name' => $cuisine['name'],
                'created_at' => new Carbon(now()),
                'sort'=>$cuisine['sort'],
            ]);
        }
    }
}

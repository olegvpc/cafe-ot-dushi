<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'menus' => json_encode(["1001", "1002", "1002", "1005"]),
                'table_id' => "ONE",
            ],
            [
                'menus' => json_encode(["1001", "1002", "1005"]),
                'table_id' => "THREE",
            ],
        ];
        foreach ($orders as $order) {
            Order::query()->firstOrCreate([
                'table_id' => $order['table_id']
            ], [
                'menus' => $order['menus'],
                'table_id' => $order['table_id'],
            ]);
        }

    }
}

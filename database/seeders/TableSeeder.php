<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [
            [
                'id' => 'ONE',
                'is_free' => true,
                'order_id' => NULL,
                'sort' => 1,
            ],
            [
                'id' => 'TWO',
                'is_free' => true,
                'order_id' => NULL,
                'sort' => 2,
            ],
            [
                'id' => 'THREE',
                'is_free' => true,
                'order_id' => NULL,
                'sort' => 3,
            ],
            [
                'id' => 'FOUR',
                'is_free' => true,
                'order_id' => NULL,
                'sort' => 4,
            ],
            [
                'id' => 'FIVE',
                'is_free' => true,
                'order_id' => NULL,
                'sort' => 5,
            ],
        ];
        foreach ($tables as $table) {
            Table::query()->firstOrCreate([
                'id' => $table['id']
            ], [
                'is_free' => $table['is_free'],
                'sort' => $table['sort'],
                'order_id' => $table['order_id'],
            ]);
        }
    }
}

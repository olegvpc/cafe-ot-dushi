<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Так можно создать только одну запись

//        User::factory()->create([
//            'name' => 'Oleg Admin',
//            'email' => 'olegvpc@yandex.ru',
//            'password' => bcrypt('12345poiuy'),
//            'admin' => true
//        ]);
        $users = [
            [
                'name' => 'Oleg Admin',
                'email' => 'olegvpc@yandex.ru',
                'password' => bcrypt('12345poiuy'),
                'admin' => true
            ],
            [
                'name' => 'Николай',
                'email' => 'nic@yandex.ru',
                'password' => bcrypt('12345'),
                'admin' => true
            ],
            [
                'name' => 'Nin',
                'email' => 'order@yandex.ru',
                'password' => bcrypt('12345'),
                'admin' => false
            ]
        ];
        foreach ($users as $user) {
            User::query()->firstOrCreate([
                'email' => $user['email']
            ], [
                'name' => $user['name'],
                'password' => $user['password'],
                'admin'=>$user['admin'],
            ]);
        }
    }
}

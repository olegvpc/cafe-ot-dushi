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
                'name' => 'Надежда',
                'email' => 'nadezhda.tkach@gmail.com',
                'password' => bcrypt('12345'),
                'admin' => true
            ],
            [
                'name' => 'Николай',
                'email' => 'nikolaiinbox@mail.ru',
                'password' => bcrypt('12345'),
                'admin' => true
            ],
            [
                'name' => 'Роман',
                'email' => 'ozon.ksm@mail.ru',
                'password' => bcrypt('12345'),
                'admin' => true
            ],
            [
                'name' => 'Nin',
                'email' => 'nin@ya.ru',
                'password' => bcrypt('12345'),
                'admin' => false
            ],
            [
                'name' => 'Nui',
                'email' => 'nui@ya.ru',
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

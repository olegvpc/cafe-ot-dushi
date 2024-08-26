<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        // 'name' => 'Test User',
        // 'email' => 'test@example.com',
        // ]);
        try {
            DB::transaction(function () {
                $this->call([
                    UserSeeder::class,
                    CategorySeeder::class,
                    CuisineSeeder::class,
                    DrinkMenuSeeder::class,
                    SaladMenuSeeder::class,
                    SoupMenuSeeder::class,
                    GarnishMenuSeeder::class,
                    BurgerMenuSeeder::class,
                    MainMenuSeeder::class,
                    BreakfastMenuSeeder::class,
                    AlcoholMenuSeeder::class,
                    TableSeeder::class,
                    DissertMenuSeeder::class,
                ]);
                DB::commit();
            });
        } catch (\Exception $e) {
            throw $e;
        }
    }
}

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
                    TableSeeder::class,
                    CuisineSeeder::class,
                    BreakfastMenuSeeder::class,
                    SaladMenuSeeder::class,
                    StarterMenuSeeder::class,
                    SoupMenuSeeder::class,
                    MainMenuSeeder::class,
                    SpecialMenuSeader::class,
                    GarnishMenuSeeder::class,
                    DissertMenuSeeder::class,
                    DrinkMenuSeeder::class,
                    AlcoholMenuSeeder::class,
                    KidsMenuSeeder::class,
                ]);
                DB::commit();
            });
        } catch (\Exception $e) {
            throw $e;
        }
    }
}

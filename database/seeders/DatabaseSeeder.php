<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(ShopTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(ShopFoodTableSeeder::class);
        $this->call(ShopLimitTableSeeder::class);
        $this->call(ShopReservationsTableSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

<?php

namespace Database\Seeders;

use Database\Seeders\UserSeeder;
use Database\Seeders\VendorSeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\OrderSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Appeler chaque seeder individuellement
        $this->call([
            UserSeeder::class,
            VendorSeeder::class,
            CustomerSeeder::class,
            CategorySeeder::class,
            OrderSeeder::class,
            ProductSeeder::class,
            CartSeeder::class,
        ]);

        // Vous pouvez également décommenter et utiliser des factory si nécessaire
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

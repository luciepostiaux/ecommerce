<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::create([
            'user_id' => 1, // Utilisez un ID d'utilisateur différent
            // Autres attributs spécifiques au client
        ]);

        // Ajoutez plus de clients ici...
    }
}

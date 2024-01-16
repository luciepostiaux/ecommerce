<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    public function run()
    {
        Vendor::create([
            'user_id' => 1,
        ]);

        Vendor::create([
            'user_id' => 2,
            // Autres attributs spécifiques au vendeur
        ]);

        // Ajoutez plus de vendeurs ici...
    }
}

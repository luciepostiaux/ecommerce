<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;
use App\Models\Customer;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assurez-vous qu'il y a des clients existants
        $customers = Customer::all();

        foreach ($customers as $customer) {
            Cart::create([
                'customer_id' => $customer->id,
                // Ajoutez d'autres attributs nécessaires ici
            ]);
        }

        // Vous pouvez également ajouter des données de cart spécifiques si nécessaire
    }
}

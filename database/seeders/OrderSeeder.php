<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::create([
            'customer_id' => 1, // Assurez-vous que ce client existe
            'status' => 'pending',
            'total' => 1599.98,
            'product_id' => 1,
            'delivery_info' => 'Livraison standard'
        ]);

        // Ajoutez plus de commandes ici...
    }
}

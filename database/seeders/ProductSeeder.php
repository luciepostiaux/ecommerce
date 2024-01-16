<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $product = Product::create([
            'vendor_id' => 1,
            'name' => 'Smartphone XYZ',
            'description' => 'Un smartphone dernier cri avec des fonctionnalités avancées',
            'price' => 799.99,
            'category_id' => 1,
            'stock' => 100,
            'image' => 'test.png',

        ]);

        $product->orders()->attach(1, ['quantity' => 5]);
    }
}

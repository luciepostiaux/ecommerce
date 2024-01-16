<?php

use App\Models\Vendor;

it("Calculer le total des ventes d'un vendeur.", function () {
    $vendor = Vendor::first();
    $totalSales = 1599.98;

    expect($vendor->totalSales())->toBe($totalSales);
});

it("Trouver les vendeurs avec le plus grand nombre de produits en stock.", function () {
    $vendorWithMostStock = Vendor::withSum('products', 'stock')
        ->orderBy('products_sum_stock', 'desc')
        ->first();

    $highestStock = $vendorWithMostStock->products_sum_stock;
    expect($highestStock)->toBeGreaterThanOrEqual(42);
});

it("Calculer la moyenne des prix des produits d'un vendeur.", function () {
    $vendor = Vendor::first();
    $averagePrice = $vendor->products()->avg('price');

    expect($vendor->averageProductPrice())->toBe($averagePrice);
});

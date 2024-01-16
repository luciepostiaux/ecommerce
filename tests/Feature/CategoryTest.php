<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

it("Calculer le chiffre d'affaires total réalisé dans une catégorie de produit.", function () {
    $category = Category::first();
    $totalRevenue = 1599.98;

    expect($category->CategoryRevenue())->toBe($totalRevenue);
});

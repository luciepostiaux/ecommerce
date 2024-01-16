<?php

use App\Models\Category;
use App\Models\Product;

it("Lister tous les produits d'une catégorie spécifique.", function () {
    $category = Category::first();
    $expectedProducts = Product::where('category_id', $category->id)->get();

    $foundProducts = $category->products;

    expect($foundProducts->pluck('id'))->toEqual($expectedProducts->pluck('id'));
});

it("Trouver un produit par son nom.", function () {
    $name = "Smartphone XYZ";
    $foundProduct = Product::getProductByName($name);

    expect($foundProduct[0]->name)->toBe("Smartphone XYZ");
});

it("Lister les produits en dessous d'un certain prix.", function () {
    $priceThreshold = 100;
    $productsBelowThreshold = Product::where('price', '<', $priceThreshold)->get();

    foreach ($productsBelowThreshold as $product) {
        expect($product->price)->toBeLessThan($priceThreshold);
    }
});

it("Afficher les produits les plus vendus.", function () {
    $bestSellers = Product::withCount('orders')
        ->orderBy('orders_count', 'desc')
        ->get();

    $firstBestSeller = $bestSellers->first();
    expect($firstBestSeller->orders_count)->toBeGreaterThanOrEqual($bestSellers->last()->orders_count);
});

it("Lister les avis récents sur un produit spécifique.", function () {
    $product = Product::first();
    $recentReviews = $product->reviews()->latest()->get();

    $latestReview = $recentReviews->first();
    foreach ($recentReviews as $review) {
        expect($review->created_at)->toBeGreaterThanOrEqual($latestReview->created_at);
    }
});

it("Lister les produits qui n'ont jamais été achetés.", function () {
    $neverPurchasedProducts = Product::doesntHave('orders')->get();

    foreach ($neverPurchasedProducts as $product) {
        expect($product->orders)->toBeEmpty();
    }
});

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * The reviews associated with the product.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * The vendor that owns the product.
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public static function findByName($name)
    {
        return self::where('name', $name)->first();
    }
    public static function belowPrice($price)
    {
        return self::where('price', '<', $price)->get();
    }
    public static function bestSellers()
    {
        return self::withCount('orders')->orderBy('orders_count', 'desc')->get();
    }
    public function recentReviews()
    {
        return $this->hasMany(Review::class)->latest();
    }
    public static function neverPurchased()
    {
        return self::doesntHave('orders')->get();
    }
    public static function getProductByName($name)
    {
        return Product::where('name', $name)->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function totalSales()
    {
        return $this->products()->with('orders')->get()->sum(function ($product) {
            return $product->orders->sum('total');
        });
    }
    public static function withMostStock()
    {
        return self::withSum('products', 'stock')->orderBy('products_sum_stock', 'desc')->get();
    }
    public function averageProductPrice()
    {
        return $this->products()->avg('price');
    }
}

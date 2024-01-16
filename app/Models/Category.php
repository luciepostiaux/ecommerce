<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function productsOfCategory()
    {
        return $this->hasMany(Product::class);
    }
    public function categoryRevenue()
    {
        return (float) $this->hasManyThrough(Order::class, Product::class)->sum('total');
    }
}

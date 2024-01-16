<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory;
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * The products that are part of the order.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public static function deliveredBetween($start, $end)
    {
        return self::whereBetween('created_at', [$start, $end])->get();
    }
 
}

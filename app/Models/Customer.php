<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function orderDetails($orderId)
    {
        return $this->orders()->where('id', $orderId)->with('products')->first();
    }
    public static function highSpenders($amount)
    {
        return self::with('orders')->get()->filter(function ($customer) use ($amount) {
            return $customer->orders->sum('total') > $amount;
        });
    }
    public function pendingOrders()
    {
        return $this->orders()->where('status', 'pending')->get();
    }
    public static function inactiveSince($date)
    {
        return self::whereDoesntHave('orders', function ($query) use ($date) {
            $query->where('created_at', '>', $date);
        })->get();
    }
}

<?php

use App\Models\Order;
use App\Models\Customer;

it("Afficher les détails d'une commande spécifique d'un client.", function () {
    $customer = Customer::first();
    $expectedOrder = $customer->orders->first();
    $foundOrder = Order::find($expectedOrder->id);

    expect($foundOrder->id)->toBe($expectedOrder->id);
    expect($foundOrder->customer_id)->toBe($customer->id);
});

it("Afficher les commandes livrées dans une certaine période.", function () {
    $start = now()->subDays(30);
    $end = now();
    $deliveredOrders = Order::whereBetween('created_at', [$start, $end])->get();

    foreach ($deliveredOrders as $order) {
        expect($order->created_at)->toBeGreaterThanOrEqual($start)
            ->toBeLessThanOrEqual($end);
    }
});

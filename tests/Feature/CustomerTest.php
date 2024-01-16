<?php

use App\Models\Customer;

it("Trouver les clients ayant dépensé plus d'un certain montant.", function () {
    $amount = 1000;
    $highSpenders = Customer::with('orders')
        ->get()
        ->filter(function ($customer) use ($amount) {
            return $customer->orders->sum('total') > $amount;
        });

    foreach ($highSpenders as $customer) {
        expect($customer->orders->sum('total'))->toBeGreaterThan($amount);
    }
});

it("Afficher les commandes en attente de livraison pour un client.", function () {
    $customer = Customer::first();
    $pendingOrders = $customer->orders()->where('status', 'pending')->get();

    foreach ($pendingOrders as $order) {
        expect($order->status)->toBe('pending');
    }
});

it("Trouver les clients qui n'ont pas fait d'achat depuis un certain temps.", function () {
    $date = now()->subYear();
    $inactiveCustomers = Customer::whereDoesntHave('orders', function ($query) use ($date) {
        $query->where('created_at', '>', $date);
    })->get();

    foreach ($inactiveCustomers as $customer) {
        $lastOrderDate = $customer->orders()->latest()->first()->created_at ?? null;
        expect($lastOrderDate)->toBeLessThan($date);
    }
});

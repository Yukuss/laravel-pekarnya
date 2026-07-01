<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\BakeryAddress;

class CartController extends Controller
{
    public function add(Request $request, MenuItem $menuItem)
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1']
        ]);
        $cart = session()->get('cart', []);
        $id = $menuItem->id;
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $data['quantity'];
        } else {
            $cart[$id] = [
                'id' => $menuItem->id,
                'name' => $menuItem->name,
                'price' => $menuItem->price,
                'image' => $menuItem->image,
                'quantity' => $data['quantity'],
            ];
        }
        session(['cart' => $cart]);
        return redirect()->back()->with('success', 'Товар добавлен в корзину!');
    }

    public function show()
    {
        $cart = session('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        return view('cart.show', compact('cart', 'total'));
    }

    public function update(Request $request)
    {
        $quantities = $request->input('quantities', []);
        $cart = session()->get('cart', []);
        foreach ($quantities as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = max(1, (int)$quantity);
            }
        }
        session(['cart' => $cart]);
        return redirect()->route('cart.show')->with('success', 'Корзина обновлена!');
    }

public function remove(MenuItem $menuItem)
{
    $cart = session()->get('cart', []);
    $id = $menuItem->id;

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session(['cart' => $cart]);

        if (empty($cart)) {
            session()->forget('cart');
        }
    }

    return redirect()->route('cart.show')->with('success', 'Товар удалён из корзины!');
}

    public function orderForm(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Корзина пуста!');
        }
        $user = auth()->user();
        $userAddresses = $user->addresses;
        $bakeryAddresses = BakeryAddress::all();
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $deliveryType = $request->input('delivery_type', 'pickup');
        return view('cart.order', compact('cart', 'userAddresses', 'bakeryAddresses', 'total', 'user', 'deliveryType'));
    }

    public function placeOrder(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Корзина пуста!');
        }
        $user = auth()->user();
        $deliveryType = $request->input('delivery_type');
        $rules = [
            'delivery_type' => ['required', 'in:pickup,delivery'],
            'payment_method' => ['required', 'in:card,cash'],
            'comment' => ['nullable', 'string', 'max:1000'],
        ];
        if ($deliveryType === 'pickup') {
            $rules['address_id'] = ['required', 'exists:bakery_addresses,id'];
        } else {
            $rules['address_id'] = ['required', 'exists:addresses,id'];
        }
        $data = $request->validate($rules);
        if ($deliveryType === 'pickup') {
            $address = \App\Models\BakeryAddress::find($data['address_id']);
            $addressString = $address->address;
        } else {
            $address = \App\Models\Address::find($data['address_id']);
            $addressString = $address->street . ', д. ' . $address->house
                . ($address->building ? ', корп. ' . $address->building : '')
                . ', кв. ' . $address->apartment
                . ', подъезд ' . $address->entrance
                . ', этаж ' . $address->floor;
        }
        $order = Order::create([
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'phone' => $user->phone,
            'email' => $user->email,
            'delivery_type' => $data['delivery_type'],
            'pickup_address' => $deliveryType === 'pickup' ? $addressString : null,
            'delivery_address' => $deliveryType === 'delivery' ? $addressString : null,
            'payment_method' => $data['payment_method'],
            'comment' => $data['comment'] ?? null,
            'total' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
            'status' => 'active',
        ]);
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_item_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
        session()->forget('cart');
        return redirect()->route('orders.active')->with('success', 'Заказ успешно оформлен!');
    }
}

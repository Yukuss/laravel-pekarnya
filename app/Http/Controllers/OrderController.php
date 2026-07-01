<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function active()
    {
        $orders = auth()->user()->orders()->active()->latest()->get();
        return view('orders.active', compact('orders'));
    }

    public function history()
    {
        $orders = auth()->user()->orders()->history()->latest()->get();
        return view('orders.history', compact('orders'));
    }

    public function complete(Order $order)
    {
        if ($order->user_id === auth()->id()) {
            $order->status = 'completed';
            $order->save();
        }
        return redirect()->route('orders.active')->with('success', 'Статус заказа изменён!');
    }
}

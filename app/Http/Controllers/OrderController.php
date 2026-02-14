<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();

        return view('orders.pizzas.index', ['orders' => $orders]);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('orders.pizzas.show', ['order' => $order]);
    }

    public function create()
    {
        return view('orders.pizzas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|not_in:0|max:255',
            'base' => 'required|string|not_in:0|max:255',
            'toppings' => 'nullable|array',
            'toppings.*' => 'string|max:255',
            'image_url' => 'required|string|not_in:0|max:255',
        ]);

        $order = new Order();
        $order->name = $validated['name'];
        $order->type = $validated['type'];
        $order->base = $validated['base'];
        $order->toppings = $validated['toppings'] ?? [];
        $order->image_url = $validated['image_url'];
        $order->save();

        return redirect(route('order.index'))->with('mssg', 'Thank you for your order');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect(route('order.index'))->with('mssg', 'Order confirmed');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderDetails = OrderDetails::with(['product:id,name'])->get();

        return view('orderDetails.index', compact('orderDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::pluck('id');
        $products = Product::pluck('name', 'id');

        return view('orderDetails.create', compact('orders', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product_price = Product::where('id', $validated['product_id'])->value('unit_price');

        $validated['unit_price'] = $product_price;
        $validated['total_price'] = $validated['quantity'] * $validated['unit_price'];

        OrderDetails::create($validated);

        return redirect()->route('order-details.index')->with('success', 'Order detail created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orderDetail = OrderDetails::findOrFail($id)->load(['product:id,name']);

        return view('orderDetails.show', compact('orderDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orderDetail = OrderDetails::findOrFail($id);
        $orders = Order::pluck('id');
        $products = Product::pluck('name', 'id');

        return view('orderDetails.edit', compact('orderDetail', 'orders', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product_price = Product::where('id', $validated['product_id'])->value('unit_price');

        $validated['unit_price'] = $product_price;
        $validated['total_price'] = $validated['quantity'] * $validated['unit_price'];

        $orderDetail = OrderDetails::findOrFail($id);
        $orderDetail->update($validated);

        return redirect()->route('order-details.index')->with('success', 'Order detail updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderDetail = OrderDetails::findOrFail($id);
        $orderDetail->delete();

        return redirect()->route('order-details.index')->with('success', 'Order detail deleted successfully.');
    }
}

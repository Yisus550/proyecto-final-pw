<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['employee:id,first_name', 'customer:id,first_name'])->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::pluck('first_name', 'id');
        $customers = Customer::pluck('first_name', 'id');

        return view('orders.create', compact(['employees', 'customers']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'customer_id' => 'required|integer|exists:customers,id',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|max:60',
        ]);

        Order::create($validated);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with(['employee:id,first_name', 'customer:id,first_name'])->findOrFail($id);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);
        $employees = Employee::pluck('first_name', 'id');
        $customers = Customer::pluck('first_name', 'id');

        return view('orders.edit', compact(['order', 'employees', 'customers']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'customer_id' => 'required|integer|exists:customers,id',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|max:60',
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}

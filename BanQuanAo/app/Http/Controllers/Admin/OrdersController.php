<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Customers;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $orders = Orders::with('customer')->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        // Fetch all customers
        $customers = Customers::all();

        // Pass the customers to the view
        return view('admin.orders.create', compact('customers'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'CustomerID' => 'required|exists:customers,CustomerID',
            'Status' => 'required|string|max:20',
            'TotalAmount' => 'required|numeric|min:0',
        ]);

        Orders::create($validated);

        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully.');
    }

    // Display the specified resource
    public function show($id)
    {
        $order = Orders::with(['customer', 'orderdetails.product'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $order = Orders::findOrFail($id);
        $customers = Customers::all();
        return view('admin.orders.edit', compact('order', 'customers'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'CustomerID' => 'required|exists:customers,CustomerID',
            'Status' => 'required|string|max:20',
            'TotalAmount' => 'required|numeric|min:0',
        ]);

        $order = Orders::findOrFail($id);
        $order->update($validated);

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $order = Orders::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}
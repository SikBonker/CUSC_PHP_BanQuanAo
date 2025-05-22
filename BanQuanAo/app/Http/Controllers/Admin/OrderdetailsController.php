<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orderdetails;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class OrderdetailsController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $orderdetails = Orderdetails::with(['order', 'product'])->get();
        return view('admin.orderdetails.index', compact('orderdetails'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        $orders = Orders::all();
        $products = Products::all();
        return view('admin.orderdetails.create', compact('orders', 'products'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'OrderID' => 'required|exists:orders,OrderID',
            'ProductID' => 'required|exists:products,ProductID',
            'Quantity' => 'required|integer|min:1',
            'UnitPrice' => 'required|numeric|min:0',
        ]);

        Orderdetails::create($validated);

        return redirect()->route('admin.orderdetails.index')->with('success', 'Order detail created successfully.');
    }

    // Display the specified resource
    public function show($id)
    {
        $orderdetail = Orderdetails::with(['order', 'product'])->findOrFail($id);
        return view('admin.orderdetails.show', compact('orderdetail'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $orderdetail = Orderdetails::findOrFail($id);
        $orders = Orders::all();
        $products = Products::all();
        return view('admin.orderdetails.edit', compact('orderdetail', 'orders', 'products'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'OrderID' => 'required|exists:orders,OrderID',
            'ProductID' => 'required|exists:products,ProductID',
            'Quantity' => 'required|integer|min:1',
            'UnitPrice' => 'required|numeric|min:0',
        ]);

        $orderdetail = Orderdetails::findOrFail($id);
        $orderdetail->update($validated);

        return redirect()->route('admin.orderdetails.index')->with('success', 'Order detail updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $orderdetail = Orderdetails::findOrFail($id);
        $orderdetail->delete();

        return redirect()->route('admin.orderdetails.index')->with('success', 'Order detail deleted successfully.');
    }
}

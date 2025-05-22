<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $customers = Customers::all();
        return view('admin.customers.index', compact('customers'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('admin.customers.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:100',
            'Email' => 'required|email|unique:customers,Email',
            'Phone' => 'required|string|max:20',
            'Address' => 'nullable|string',
        ]);

        Customers::create($validated);

        return redirect()->route('admin.customers.index')->with('success', 'Customer created successfully.');
    }

    // Display the specified resource
    public function show($id)
    {
        $customer = Customers::findOrFail($id);
        return view('admin.customers.show', compact('customer'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $customer = Customers::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:100',
            'Email' => 'required|email|unique:customers,Email,' . $id . ',CustomerID',
            'Phone' => 'required|string|max:20',
            'Address' => 'nullable|string',
        ]);

        $customer = Customers::findOrFail($id);
        $customer->update($validated);

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $customer = Customers::findOrFail($id);
        $customer->delete();

        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }
}

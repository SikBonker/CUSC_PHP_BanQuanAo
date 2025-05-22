<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;

class BrandsController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $brands = Brands::all();
        return view('admin.brands.index', compact('brands'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('admin.brands.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'BrandName' => 'required|string|max:100|unique:brands,BrandName',
        ]);

        Brands::create($validated);

        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $brand = Brands::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'BrandName' => 'required|string|max:100|unique:brands,BrandName,' . $id . ',BrandID',
        ]);

        $brand = Brands::findOrFail($id);
        $brand->update($validated);

        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $brand = Brands::findOrFail($id);
        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully.');
    }
}

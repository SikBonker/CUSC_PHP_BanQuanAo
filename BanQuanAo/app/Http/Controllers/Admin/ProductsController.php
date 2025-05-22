<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $products = Products::with('category', 'brand')->get();
        return view('admin.products.index', compact('products'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        $categories = Categories::all();
        $brands = Brands::all(); // Fetch all brands
        return view('admin.products.create', compact('categories', 'brands'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ProductName' => 'required|string|max:100',
            'CategoryID' => 'required|exists:categories,CategoryID',
            'BrandID' => 'required|exists:brands,BrandID',
            'Size' => 'nullable|string|max:10',
            'Color' => 'nullable|string|max:30',
            'Price' => 'required|numeric|min:0',
            'Stock' => 'required|integer|min:0',
            'Description' => 'nullable|string',
            'Picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $newProduct = new Products();
        $newProduct->ProductName = $request->ProductName;
        $newProduct->CategoryID = $request->CategoryID;
        $newProduct->BrandID = $request->BrandID;
        $newProduct->Size = $request->Size;
        $newProduct->Color = $request->Color;
        $newProduct->Price = $request->Price;
        $newProduct->Stock = $request->Stock;
        $newProduct->Description = $request->Description;

        // Handle file upload
        if ($request->hasFile('Picture')) {
            $file = $request->file('Picture');
            $newProduct->Picture = date('Ymd_His_') . $file->getClientOriginalName();
            $file->storeAs('products', $newProduct->Picture, 'public');
        }

        $newProduct->save();

        session()->flash('success', 'Product created successfully.');

        return redirect()->route('admin.products.index');
    }

    // Display the specified resource
    public function show($id)
    {
        $product = Products::with('category', 'brand')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Categories::all();
        $brands = Brands::all(); // Fetch all brands
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'ProductName' => 'required|string|max:100',
            'CategoryID' => 'required|exists:categories,CategoryID',
            'BrandID' => 'required|exists:brands,BrandID',
            'Size' => 'nullable|string|max:10',
            'Color' => 'nullable|string|max:30',
            'Price' => 'required|numeric|min:0',
            'Stock' => 'required|integer|min:0',
            'Description' => 'nullable|string',
            'Picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Products::findOrFail($id);

        // Update other fields
        $product->ProductName = $request->ProductName;
        $product->CategoryID = $request->CategoryID;
        $product->BrandID = $request->BrandID;
        $product->Size = $request->Size;
        $product->Color = $request->Color;
        $product->Price = $request->Price;
        $product->Stock = $request->Stock;
        $product->Description = $request->Description;

        // Handle file upload
        if ($request->hasFile('Picture')) {
            // Delete the old picture if it exists
            if ($product->Picture) {
                Storage::disk('public')->delete('products/' . $product->Picture);
            }

            // Store the new picture with a renamed file name
            $file = $request->file('Picture');
            $product->Picture = date('Ymd_His_') . $file->getClientOriginalName();
            $file->storeAs('products', $product->Picture, 'public');
        }

        $product->save();

        session()->flash('success', 'Product updated successfully.');

        return redirect()->route('admin.products.index');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $deletingProduct = Products::findOrFail($id);

        // Delete the picture file if it exists
        if ($deletingProduct->Picture) {
            Storage::disk('public')->delete('products/' . $deletingProduct->Picture);
        }

        $deletingProduct->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}

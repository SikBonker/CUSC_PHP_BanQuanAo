<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $categories = Categories::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'CategoryName' => 'required|string|max:50',
        ]);

        Categories::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    // Display the specified resource
    public function show($id)
    {
        $category = Categories::findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'CategoryName' => 'required|string|max:50',
        ]);

        $category = Categories::findOrFail($id);
        $category->update($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}

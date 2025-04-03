<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.list', compact('products'));
    }

    public function manage()
    {
        if (!auth()->user()->hasPermissionTo('manage_products')) {
            abort(403, 'Unauthorized action.');
        }

        $products = Product::all();
        return view('products.manage', compact('products'));
    }

    public function create()
    {
        if (!auth()->user()->hasPermissionTo('manage_products')) {
            abort(403, 'Unauthorized action.');
        }

        return view('products.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->hasPermissionTo('manage_products')) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('products', 'public');
            $validated['photo'] = $path;
        }

        Product::create($validated);

        return redirect()->route('products.manage')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        if (!auth()->user()->hasPermissionTo('manage_products')) {
            abort(403, 'Unauthorized action.');
        }

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if (!auth()->user()->hasPermissionTo('manage_products')) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }
            $path = $request->file('photo')->store('products', 'public');
            $validated['photo'] = $path;
        }

        $product->update($validated);

        return redirect()->route('products.manage')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if (!auth()->user()->hasPermissionTo('manage_products')) {
            abort(403, 'Unauthorized action.');
        }

        // Delete photo if exists
        if ($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }

        $product->delete();

        return redirect()->route('products.manage')->with('success', 'Product deleted successfully.');
    }
} 
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductPhoto;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('photos')->get();
        return view("products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'status' => 'required',
        ]);

        // إنشاء المنتج
        $product = Product::create(array_merge($validated, ['user_id' => auth()->id()]));

        // رفع الصور إن وجدت
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                ProductPhoto::create([
                    'product_id' => $product->id,
                    'url' => $photo->store('products', 'public'),
                ]);
            }
        }

        return back()->with('success', 'Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('photos')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required',
            'price' => 'sometimes|required',
            'description' => 'sometimes|required',
            'photos.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'status' => 'sometimes|required',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        // Handle photo uploads if present
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                ProductPhoto::create([
                    'product_id' => $product->id,
                    'url' => $photo->store('products', 'public'),
                ]);
            }
        }

        return back()->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('home.index')->with('success', 'Product deleted successfully');
    }
}

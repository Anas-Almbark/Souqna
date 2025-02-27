<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->guard('admin')->check()) {
            // If admin, show products pending approval
            $products = Product::where('check', 0)->get();
            return view('adminproducts.products', compact('products'));
        } else {
            // If regular user, show all approved products
            $products = Product::with('photos')->where('check', 1)->get();
            return view("products.index", compact("products"));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("products.create", compact("categories"));
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

<<<<<<< HEAD
    // إضافة المنتج مع تعيين `check` إلى 0 (قيد المراجعة)
    $product = Product::create(array_merge($validated, [
        'user_id' => auth()->id(),
        'check' => 0, // المنتج قيد المراجعة
    ]));

    // رفع الصور إن وجدت
    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $photo) {
            ProductPhoto::create([
                'product_id' => $product->id,
                'url' => $photo->store('products', 'public'),
            ]);
        }
=======
        // إنشاء المنتج
        $product = Product::create(array_merge($validated, ['user_id' => auth()->id()]));
        // Attach categories to the product
        if ($request->has('categories')) {
            $product->categories()->attach($request->categories);
        }
        // رفع الصور إن وجدت
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                ProductPhoto::create([
                    'product_id' => $product->id,
                    'url' => $photo->store('products', 'public'),
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Added successfully');
>>>>>>> 7a6ff9abc715a4755f819937d0f22c306653f7a9
    }

    return back()->with('success', 'The product has been sent for review.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with(['photos', 'categories'])->findOrFail($id);
        $product->load('photos');
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
        
        // Delete product photos from storage
        foreach($product->photos as $photo) {
            if(Storage::disk('public')->exists($photo->url)) {
                Storage::disk('public')->delete($photo->url);
            }
        }
        
        $product->delete();
        return redirect()->route('home.index')->with('success', 'Product deleted successfully');
    }


    public function approve($id)
{
    $product = Product::findOrFail($id);
    $product->update(['check' => 1]); // الموافقة على المنتج
    return back()->with('success', 'The product is approved');
}

public function reject($id)
{
    $product = Product::findOrFail($id);
    $product->update(['check' => 2]); // رفض المنتج
    return back()->with('error', 'The product is rejected');
}
// public function homeindex()
// {
//     $products = Product::with(['photos', 'categories'])
//         ->where('check', 1)
//         ->get();
//     return view('shared.home', compact('products'));
// }
}

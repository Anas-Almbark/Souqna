<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Support\Facades\Auth;

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
        }

        $followerIds = Auth::user()->followers->pluck('follower_id');

        if ($followerIds->isNotEmpty()) {
            $notifications = $followerIds->map(function ($followerId) use ($product) {
                return [
                    'receiver_id' => $followerId,
                    'sender_id' => Auth::id(),
                    'message' => "added a new product: {$product->name}",
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            })->toArray();

            Notification::insert($notifications);
        }
        return back()->with('success', 'The product has been sent for review.');
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

    public function shopSingle(string $id)
    {
$product = Product::with(['categories','photos'])->findOrFail($id);
        
        // Get the product's evaluation/rating
        $rate = \App\Models\Evaluation::where('product_id', $id)->first();
        
        // Initialize variables for user rating status
        $userHasRated = null;
        $userRating = null;
        $productRating = null;

        // If product has any rating, get it for display to non-logged in users
        if ($rate) {
            $productRating = $rate->rate;
        }
        
        // If user is logged in, check their specific rating
        if (auth()->check()) {
            $evaluation = \App\Models\Evaluation::where('product_id', $id)
                ->where('buyer', auth()->user()->id)
                ->first();
                
            $userHasRated = !is_null($evaluation);
            $userRating = $userHasRated ? $evaluation->rate : null;
        }

        return view('shared.shopSingle', compact('product', 'rate', 'userHasRated', 'userRating', 'productRating'));
    }
    public function rateStore(Request $request)
    {
        // Check if user has already rated this product
        $userHasRated = \App\Models\Evaluation::where('product_id', $request->product_id)
            ->where('buyer', auth()->user()->id)
            ->exists();

        if ($userHasRated) {
            return redirect()->back()->with('error', 'You have already rated this product');
        }

        $product = Product::findOrFail($request->product_id);
        $evaluation = new \App\Models\Evaluation();
        $evaluation->buyer = auth()->user()->id;
        $evaluation->seller = $product->user_id;
        $evaluation->rate = $request->rating;
        $evaluation->product_id = $product->id;
        $evaluation->save();

        return redirect()->back()->with('success', 'Rated successfully');
    }
    // public function homeindex()
    // {
    //     $products = Product::with(['photos', 'categories'])
    //         ->where('check', 1)
    //         ->get();
    //     return view('shared.home', compact('products'));
    // }
}

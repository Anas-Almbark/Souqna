<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       dd("show products");
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
        $request->validate([
            "name"=> "required",
            "price"=> "required",
            "description"=> "required",
            "image"=> "required",
            "status"=> "required",
        ]);
        $product = new Product();
$product->user_id = auth()->id();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->status= $request->status;
        $product->save();

        // Handle multiple product photos

        if(request()->has("image")){

$product->photos()->create([
    'image' => request()->file('image')->store('product_photos', 'public')
]);
       

    }
    return redirect()->back()->with("success","added successfully");
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd("show product");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dd("edit product");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd("update product");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd("delete product");
    }
}

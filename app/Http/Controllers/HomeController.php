<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductPhoto;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with(['photos', 'categories'])
            ->where('check', 1)
            ->get();
        return view('shared.home', compact('products'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function show($productId)
    {
        $product = Product::with('size.size_option')->whereId($productId)->first();
        return Inertia::render('Product', [
            'product' => $product
        ]);
    }
}

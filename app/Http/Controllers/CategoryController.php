<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index(Request $request, $categoryId)
    {
        $product = Product::
        when(request()->input('search'), function ($query, $search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })
        ->when(request()->input('min'), function ($query, $min) {
            $query->where('price', '>=', $min);
        })
        ->when(request()->input('max'), function ($query, $max) {
            $query->where('price', '<=', $max);
        })
        ->whereCategoryId($categoryId)
        ->paginate(9)
        ->withQueryString();

        // Mendapatkan range slider tertinggi
        $categories = Category::get();
        $defaultPrice = Product::whereCategoryId($categoryId)->orderBy('price', 'desc')->first()->price;
        $maxPrice = pow(10, strlen($defaultPrice));
        return Inertia::render('Category', [
            'categoryId' => $categoryId,
            'categories' => $categories,
            'product' => $product,
            'filters' => Request()->hasAny(['min', 'max', 'search']) ? Request()->only(['min', 'max', 'search']) : ['search' => '', 'min' => 0, 'max' => $maxPrice],
            'maxPrice' => $maxPrice,

        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $categoryWithProduct = Category::query()
        ->with(['product' => function($query){
            request()->whenFilled('search', function($search) use ($query){
                $query->where('name', 'LIKE', '%' . $search . '%');
            });
            request()->whenFilled('min', function($min) use ($query){
                $query->where('price', '>=', $min);
            });
            request()->whenFilled('max', function($max) use ($query){
                $query->where('price', '<=', $max);
            });

        }])
        ->when(Request()->input('search'), function($query, $search){
            request()->whenFilled('search', function($search) use ($query){
                $query->whereHas('product', function($query) use ($search){
                    $query->where('name', 'LIKE', '%' . $search . '%');
                });
            });
            request()->whenFilled('min', function($min) use ($query){
                $query->whereHas('product', function($query) use ($min){
                    $query->where('price', '>=', $min);
                });
            });
            request()->whenFilled('max', function($max) use ($query){
                $query->whereHas('product', function($query) use ($max){
                    $query->where('price', '<=', $max);
                });
            });
        })
        ->get()->map(function($query){
            return $query->setRelation('product', $query->product->take(9));
        });
        $defaultPrice = Product::orderBy('price', 'desc')->first()->price;
        $maxPrice = pow(10, strlen($defaultPrice));

        $categories = Category::get();
        $slider = Slider::get();
        return Inertia::render('Home', [
            'categories' => $categories,
            'categoryWithProduct' => $categoryWithProduct,
            'contentSlider' => $slider,
            'filters' => Request()->hasAny(['min', 'max', 'search']) ? Request()->only(['min', 'max','search']) : ['search' => '', 'min' => 0, 'max' => $maxPrice],
            'maxPrice' => $maxPrice
        ]);
    }

    public function categoryExpand(Category $category)
    {
        dd('hoha');
    }

    public function productDetail()
    {
        dd('heha');
    }
}

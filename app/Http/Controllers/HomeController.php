<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $categoryWithProduct = Category::query()
        ->with(['product' => function($query){
            $query->when(Request()->input('search'), function($query, $search){
                $query->where('name', 'LIKE', '%' . $search . '%');
            });
        }])
        ->when(Request()->input('search'), function($query, $search){
            $query->whereHas('product', function($query){
                $query->where('name', 'LIKE', '%' . Request()->input('search') . '%');
            });
        })
        ->get()->map(function($query){
            return $query->setRelation('product', $query->product->take(9));
        });
        return Inertia::render('Home', [
            'categoryWithProduct' => $categoryWithProduct,
            'filters' => Request()->only(['search'])
        ]);
    }

    public function detail(Category $category)
    {

    }
}

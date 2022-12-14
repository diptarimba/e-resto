<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use stdClass;

use function Termwind\render;

class HomeController extends Controller
{
    public function index()
    {
        $categoryWithProduct = Category::query()
            ->with(['product' => function ($query) {
                request()->whenFilled('search', function ($search) use ($query) {
                    $query->where('name', 'LIKE', '%' . $search . '%');
                });
                request()->whenFilled('min', function ($min) use ($query) {
                    $query->where('price', '>=', $min);
                });
                request()->whenFilled('max', function ($max) use ($query) {
                    $query->where('price', '<=', $max);
                });
            }])
            ->when(Request()->input('search'), function ($query, $search) {
                request()->whenFilled('search', function ($search) use ($query) {
                    $query->whereHas('product', function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%');
                    });
                });
                request()->whenFilled('min', function ($min) use ($query) {
                    $query->whereHas('product', function ($query) use ($min) {
                        $query->where('price', '>=', $min);
                    });
                });
                request()->whenFilled('max', function ($max) use ($query) {
                    $query->whereHas('product', function ($query) use ($max) {
                        $query->where('price', '<=', $max);
                    });
                });
            })
            ->get()->map(function ($query) {
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
            'filters' => Request()->hasAny(['min', 'max', 'search']) ? Request()->only(['min', 'max', 'search']) : ['search' => '', 'min' => 0, 'max' => $maxPrice],
            'maxPrice' => $maxPrice
        ]);
    }

    public function productDetail()
    {
        return Inertia::render('Product');
    }

    public function cart()
    {
        return Inertia::render('Cart');
    }

    public function wishlist()
    {
        return Inertia::render('Wishlist');
    }

    public function place_order(Request $request)
    {

        $this->validate($request, [
            'total' => 'numeric',
            'items' => 'array',
            'token' => 'string',
            'total_items' => 'numeric',
            'items.*.product_id' => 'exists:products,id',
            'items.*.quantity' => 'required',
            'items.*.option' => 'array',
            'items.*.option.*' => 'exists:product_size_options,id'
        ]);

        $customerId = Customer::firstOrCreate(
            ['token' => $request->token]
        )->id;

        $order = Order::create([
            'name' => 'Pelanggan',
            'table_id' => 1,
            'customer_id' => $customerId,
            'quantity' => $request->total_items,
            'pay_amount' => $request->total,
            'status' => Order::$ORDER_STATUS_ACCEPT,
        ]);

        foreach($request->items as $each)
        {
            $each = (object) $each;
            $order_detail = $order->order_detail()->create([
                'product_id' => $each->product_id,
                'quantity' => $each->quantity,
                'note' => $each->note ?? ''
            ]);

            $order_detail->product_option()->attach($each->option);
        }

        return redirect()->route('home.cart')->with(["message" => "Success Create", "order_number" => $order->order_number]);
    }

    public function order($token)
    {
        $order = Order::with('customer')->whereHas('customer', function($query) use ($token){
            $query->whereToken($token);
        })->get();

        return Inertia::render('Order', [
            'order' => $order
        ]);
    }

    public function order_detail($id)
    {
        $order = Order::with('order_detail.product', 'order_detail.product_option', 'customer')->whereId($id)->first();
        return Inertia::render('OrderDetail', [
            'order' => $order
        ]);
    }
}

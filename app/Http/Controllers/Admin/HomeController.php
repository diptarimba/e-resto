<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Table;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sales = Order::count();
        $customer = Customer::count();
        $product = Product::count();
        $table = Table::count();
        $payment = Payment::count();

        return view('admin.home.index', compact('sales', 'customer', 'product', 'table', 'payment'));
    }
}

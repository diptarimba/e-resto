<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CashFlow;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Table;
use Carbon\Carbon;
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
        $salesAllTime = Order::sum('pay_amount');
        $salesToday = Order::whereDate('created_at', Carbon::today())->sum('pay_amount');
        $revenueAllTime = CashFlow::sum('value');
        $revenueToday = CashFlow::whereDate('created_at', Carbon::today())->sum('value');

        return view('admin.home.index', compact('sales', 'customer', 'product', 'table', 'payment', 'salesAllTime', 'salesToday', 'revenueAllTime', 'revenueToday'));
    }
}

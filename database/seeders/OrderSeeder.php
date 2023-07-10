<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = Customer::with('order')->get();

        $orderTime = Carbon::now();
        foreach($customer as $each){

            $orderByCustomer = $orderTime->subDay();

            $products = Product::inRandomOrder()->take(3)->get();
            $orderDetail = ['total' => 0, 'quantity' => 0];
            foreach($products as $product){
                $quantity = rand(1,4);
                $orderDetail['quantity'] += $quantity;
                $orderDetail['total'] += $product->price * $quantity;
                $orderDetail['data'][] = [
                    'product_id' => $product->id,
                    'quantity' => $quantity
                ];
            }

            $order = $each->order()->create([
                'name' => 'Pelanggan',
                'table_id' => 1,
                'quantity' => $orderDetail['quantity'],
                'pay_amount' => $orderDetail['total'],
                'status' => 'ACCEPT',
                'order_number' => date('Ymd') . ucwords(Str::random(10)),
                'created_at' => $orderByCustomer->format("Y-m-d H:i:s"),
                'updated_at' => $orderByCustomer->format("Y-m-d H:i:s")
            ]);

            foreach($orderDetail['data'] as $each){
                $order->order_detail()->create(array_merge($each, ['note' => '']));
            }
        }
    }
}

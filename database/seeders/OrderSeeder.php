<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
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
        $customer = Customer::get()->pluck('id');

        foreach($customer as $each){
            Order::create([
                'name' => 'Pelanggan',
                'table_id' => 1,
                'quantity' => rand(1,10),
                'pay_amount' => rand(10000, 100000),
                'status' => 'ACCEPT',
                'order_number' => date('Ymd') . ucwords(Str::random(10)),
                'customer_id' => $each
            ]);
        }
    }
}

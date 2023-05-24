<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    public static $ORDER_STATUS_ACCEPT = 'ACCEPT';
    public static $ORDER_STATUS_PROCESS = 'PROCESS';
    public static $ORDER_STATUS_CANCEL = 'CANCEL';
    public static $ORDER_STATUS_COMPLETE = 'COMPLETE';
    public static $ORDER_NEXT_ACCEPT = [['key' => 'CANCEL', 'val' => 'danger'], ['key' => 'PROCESS', 'val' => 'secondary']];
    public static $ORDER_NEXT_PROCESS = [['key' => 'COMPLETE', 'val' => 'info']];
    public static $ORDER_NEXT_CANCEL = [['key' => 'ACCEPT', 'val' => 'success']];
    public static $ORDER_NEXT_COMPLETE = [];

    protected $fillable = [
        'name',
        'table_id',
        'quantity',
        'pay_amount',
        'customer_id',
        'order_number',
        'status',
        'cash_flow_id'
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($order) {
            $order->order_number = date('Ymd') . ucwords(Str::random(10));
        });
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }

    public function cash_flow()
    {
        return $this->belongsTo(CashFlow::class, 'cash_flow_id');
    }

    public function createCashFlow($data)
    {
        $cashFlow = CashFlow::create($data);
        $this->cash_flow()->associate($cashFlow);
        $this->save();
        return $cashFlow;
    }

    public function payment_method()
    {
        return $this->cash_flow->payment_method();
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}

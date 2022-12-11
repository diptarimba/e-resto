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

    protected $fillable = [
        'name',
        'table_id',
        'quantity',
        'pay_amount',
        'customer_id',
        'order_number',
        'status',
        'payment_id'
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

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
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

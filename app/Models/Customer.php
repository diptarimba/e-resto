<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'token'
    ];

    protected $append = [
        'order_count'
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function getOrderCountAttribute()
    {
        return $this->order()->count();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'table_id',
        'quantity',
        'pay_amount',
        'is_paid',
        'is_leave',
        'payment_id'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}

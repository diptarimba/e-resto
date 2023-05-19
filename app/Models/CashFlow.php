<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashFlow extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'payment_id'
    ];

    public function payment_method(){
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function order(){
        return $this->hasOne(Order::class);
    }
}

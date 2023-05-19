<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    public function cash_flow()
    {
        return $this->hasMany(CashFlow::class, 'payment_id');
    }
}

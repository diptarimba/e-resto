<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizeOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_size_id',
        'name'
    ];

    protected $hidden = [
        'product_size_id',
        'created_at',
        'updated_at'
    ];

    public function size()
    {
        return $this->belongsTo(ProductSize::class, 'product_size_id');
    }

    public function order_detail()
    {
        return $this->belongsToMany(OrderDetail::class, 'order_detail_options', 'product_size_option_id', 'order_detail_id');
    }
}

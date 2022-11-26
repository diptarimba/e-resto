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

    public function product_size()
    {
        return $this->belongsTo(ProductSize::class, 'product_size_id');
    }
}

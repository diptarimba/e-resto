<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'type'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function product_option()
    {
        return $this->hasMany(ProductSizeOption::class, 'product_size_id');
    }

}

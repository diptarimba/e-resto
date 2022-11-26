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

    protected $hidden = [
        'product_id',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function size_option()
    {
        return $this->hasMany(ProductSizeOption::class, 'product_size_id');
    }

}

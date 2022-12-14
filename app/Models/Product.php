<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'quantity',
        'description',
        'category_id'
    ];

    protected $appends = [
        'category_name'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }

    public function size()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }

    public function getCategoryNameAttribute()
    {
        return $this->category()->first()->name ?? null;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //Tersedia
    public static $AVAIL = 'AVAIL';
    //Product Size Belum Diisi
    public static $DISABLED = 'DISABLED';
    //Quantity Habis
    public static $SUSPEND = 'SUSPEND';

    public static $message_product = [
        'AVAIL' => 'Produk Ditampilkan',
        'DISABLED' => 'Product Size Belum Diisi',
        'SUSPEND' => 'Quantity Habis'
    ];

    protected $fillable = [
        'name',
        'price',
        'image',
        'quantity',
        'description',
        'category_id',
        'status'
    ];

    protected $appends = [
        'category_name',
        'image'
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

    public function getImageAttribute()
    {
        return $this->product_image->pluck('image') ?? null;
    }

    public function product_image()
    {
        return $this->hasMany(PictureProduct::class, 'product_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function($product){
            $product->status = $product::$DISABLED;
        });
    }

    public function setAvailable(){
        $this->update(['status' => $this::$AVAIL]);
    }

    public function setDisabled(){
        $this->update(['status' => $this::$DISABLED]);
    }

    public function setSuspend(){
        $this->update(['status' => $this::$SUSPEND]);
    }


}

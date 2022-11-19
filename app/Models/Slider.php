<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_tag',
        'title',
        'sub_title_1',
        'sub_title_2',
        'background',
        'product_pict'
    ];
}

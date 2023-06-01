<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\PictureProduct;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductSizeOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(3)->create()->map(function($query){
            Product::factory()->count(20)->state([
                'category_id' => $query->id
            ])->create()->map(function($query){
                PictureProduct::factory()->count(3)->state(
                    [ 'image' => '/storage/placeholder/product/Sop/tmp1.png','product_id' => $query->id],
                    [ 'image' => '/storage/placeholder/product/Sop/tmp2.png','product_id' => $query->id],
                    [ 'image' => '/storage/placeholder/product/Sop/tmp3.png','product_id' => $query->id]
                )->create();
                ProductSize::factory()->count(2)->state([
                    'product_id' => $query->id
                ])->create()->map(function($query){
                    ProductSizeOption::factory()->count(4)->state([
                        'product_size_id' => $query->id
                    ])->create();
                });
            });
        });
    }
}

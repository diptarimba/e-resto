<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::factory()->count(3)->state(new Sequence(
            ['background' => '/storage/placeholder/slider/bg/bg-place-1.png', 'product_pict' => '/storage/placeholder/slider/product/product-1.png'],
            ['background' => '/storage/placeholder/slider/bg/bg-place-2.png', 'product_pict' => '/storage/placeholder/slider/product/product-2.png'],
            ['background' => '/storage/placeholder/slider/bg/bg-place-3.png', 'product_pict' => '/storage/placeholder/slider/product/product-3.png']
        ))->create();
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title_tag' => fake()->words(3, true),
            'title' => fake()->word(),
            'sub_title_1' => fake()->word(),
            'sub_title_2' => fake()->numberBetween(51,100),
            'background' => '/storage/placeholder/slider/bg/bg-place-1.png',
            'product_pict' => '/storage/placeholder/slider/product/product-1.png'
        ];
    }
}

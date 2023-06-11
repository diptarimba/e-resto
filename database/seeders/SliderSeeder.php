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
            ['image' => '/storage/placeholder/slider/bg/bg-place-1.jpg'],
            ['image' => '/storage/placeholder/slider/bg/bg-place-2.jpg'],
            ['image' => '/storage/placeholder/slider/bg/bg-place-3.jpg']
        ))->create();
    }
}

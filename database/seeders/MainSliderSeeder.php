<?php

namespace Database\Seeders;

use App\Models\MainSlider;
use Illuminate\Database\Seeder;

class MainSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slider = MainSlider::create(['name' => 'Main Slider displayed at the top']);

        $slider->addMedia(public_path('images/events/1.jpg'))->preservingOriginal()->toMediaCollection();
        $slider->addMedia(public_path('images/events/2.jpg'))->preservingOriginal()->toMediaCollection();
        $slider->addMedia(public_path('images/events/3.jpg'))->preservingOriginal()->toMediaCollection();
    }
}

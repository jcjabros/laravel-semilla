<?php

use Illuminate\Database\Seeder;
use App\HomeSlider;
class HomeSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homeSlider = new HomeSlider();
        $homeSlider->image1 = 'noimage.jpg';
        $homeSlider->image2 = 'noimage.jpg';
        $homeSlider->image3 = 'noimage.jpg';
        $homeSlider->save();
    }
}

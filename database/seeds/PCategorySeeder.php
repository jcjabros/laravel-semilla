<?php

use Illuminate\Database\Seeder;
use App\PCategory;
class PCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $category = new PCategory();
            $category->name = 'Base Seed';
            $category->sizes = '25x75 | 60x60 | 45x45 | 20x20 ';
            $category->description = 'Fusce et augue non dui pulvinar dapibus eget non libero. Donec molestie scelerisque nisi, 
            ac ultricies erat finibus sed. In finibus, risus a egestas interdum, 
            lorem ipsum semper eros, in scelerisque mi lectus non ex.';
            $category->cover_image = 'cover-ex.png';
            $category->save();
        
            $category = new PCategory();
            $category->name = 'Roof Seed';
            $category->sizes = '25x75 | 60x60 | 45x45 | 20x20 ';
            $category->description = 'Fusce et augue non dui pulvinar dapibus eget non libero. Donec molestie scelerisque nisi, 
                                      ac ultricies erat finibus sed. In finibus, risus a egestas interdum, 
                                      lorem ipsum semper eros, in scelerisque mi lectus non ex.';
            $category->cover_image = 'cover-ex.png';
            $category->save();
        
            $category = new PCategory();
            $category->name = 'Bath Seed';
            $category->sizes = '25x75 | 60x60 | 45x45 | 20x20 ';
            $category->description = 'Fusce et augue non dui pulvinar dapibus eget non libero. Donec molestie scelerisque nisi, 
            ac ultricies erat finibus sed. In finibus, risus a egestas interdum, 
            lorem ipsum semper eros, in scelerisque mi lectus non ex.';
            $category->cover_image = 'cover-ex.png';
            $category->save();
            }
    }
}

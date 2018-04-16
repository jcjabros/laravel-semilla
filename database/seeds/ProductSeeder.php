<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\PCategory;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    $categoryBase = PCategory::where('name', 'base seed')->first();
    $categoryRoof = PCategory::where('name', 'roof seed')->first();
    $categoryBath = PCategory::where('name', 'bath seed')->first();

    $product = new Product();
    $product->name = 'Product 1 Seed';
    $product->productCode = 'base-4556';
    $product->size = 'Size';
    $product->description = 'Fusce et augue non dui pulvinar dapibus eget non libero. 
                                Donec molestie scelerisque nisi, ac ultricies erat finibus sed. 
                                In finibus, risus a egestas interdum, lorem ipsum semper eros, in scelerisque mi lectus non ex.';
    $product->cover_img1 = 'noimage.jpg';
    $product->cover_img2 = 'noimage.jpg';
    $product->cover_img3 = 'noimage.jpg';
    $product->catalog_pdf ='noimage.jpg';
    $product->price = '1000';
    $product->p_category_id = $categoryBase->id;
    $product->save();

    $product = new Product();
    $product->name = 'Product 2 Seed';
    $product->productCode = 'base-4556';
    $product->size = 'Size';
    $product->description = 'Fusce et augue non dui pulvinar dapibus eget non libero. 
                                Donec molestie scelerisque nisi, ac ultricies erat finibus sed. 
                                In finibus, risus a egestas interdum, lorem ipsum semper eros, in scelerisque mi lectus non ex.';
    $product->cover_img1 = 'noimage.jpg';
    $product->cover_img2 = 'noimage.jpg';
    $product->cover_img3 = 'noimage.jpg';
    $product->catalog_pdf ='noimage.jpg';
    $product->price = '1000';
    $product->p_category_id = $categoryBase->id;
    $product->save();

    $product = new Product();
    $product->name = 'Product 3 Seed';
    $product->productCode = 'base-4556';
    $product->size = 'Size';
    $product->description = 'Fusce et augue non dui pulvinar dapibus eget non libero. 
                                Donec molestie scelerisque nisi, ac ultricies erat finibus sed. 
                                In finibus, risus a egestas interdum, lorem ipsum semper eros, in scelerisque mi lectus non ex.';
    $product->cover_img1 = 'noimage.jpg';
    $product->cover_img2 = 'noimage.jpg';
    $product->cover_img3 = 'noimage.jpg';
    $product->catalog_pdf ='noimage.jpg';
    $product->price = '1000';
    $product->p_category_id = $categoryBase->id;
    $product->save();

    $product = new Product();
    $product->name = 'Product 4 Seed';
    $product->productCode = 'base-4556';
    $product->size = 'Size';
    $product->description = 'Fusce et augue non dui pulvinar dapibus eget non libero. 
                                Donec molestie scelerisque nisi, ac ultricies erat finibus sed. 
                                In finibus, risus a egestas interdum, lorem ipsum semper eros, in scelerisque mi lectus non ex.';
    $product->cover_img1 = 'noimage.jpg';
    $product->cover_img2 = 'noimage.jpg';
    $product->cover_img3 = 'noimage.jpg';
    $product->catalog_pdf ='noimage.jpg';
    $product->price = '1000';
    $product->p_category_id = $categoryRoof->id;
    $product->save();
    }
}

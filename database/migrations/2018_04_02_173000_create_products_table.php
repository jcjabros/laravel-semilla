<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('productCode');
            $table->string('size');
            $table->mediumText('description');
            $table->string('cover_img1');
            $table->string('cover_img2');
            $table->string('cover_img3');
            $table->string('catalog_pdf')->default('No_PDF');
            $table->integer('price');
            $table->integer('p_category_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

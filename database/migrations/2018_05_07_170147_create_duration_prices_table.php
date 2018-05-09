<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDurationPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duration_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('duration');
            $table->integer('price');
            $table->unsignedInteger('treatment_id');
            $table->foreign('treatment_id')->references('id')->on('treatments')
            ->onDelete('cascade');
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
        Schema::dropIfExists('duration_prices');
    }
}

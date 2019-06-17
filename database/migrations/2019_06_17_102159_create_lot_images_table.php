<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lot_id')->unsigned()->nullable();
            $table->string('image_src')->nullable();
            $table->string('image_descr')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('image_title')->nullable();
            $table->timestamps();
        });

        Schema::table('lot_images', function (Blueprint $table) {
            $table->foreign('lot_id')->references('id')->on('lots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lot_images');
    }
}

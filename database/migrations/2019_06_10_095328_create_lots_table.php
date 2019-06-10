<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->text('desr')->nullable();
            $table->string('car_model')->nullable();
            $table->string('vin');
            $table->integer('category_id')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('car_mileage')->nullable();
            $table->string('car_options')->nullable();
            $table->integer('status')->nullable();
            $table->integer('views')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
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
        Schema::dropIfExists('lots');
    }
}

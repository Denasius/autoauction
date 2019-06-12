<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attr_id')->unsigned()->nullable();
            $table->bigInteger('lot_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('lot_attributes', function ($table) {
            $table->foreign('attr_id')->references('id')->on('attributes');
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
        Schema::dropIfExists('lot_attributes');
    }
}

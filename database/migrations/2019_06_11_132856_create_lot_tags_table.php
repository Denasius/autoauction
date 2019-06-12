<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lot_id')->unsigned()->nullable();
            $table->bigInteger('tag_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('lot_tags', function ($table) {
            $table->foreign('tag_id')->references('id')->on('tags');
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
        Schema::dropIfExists('lot_tags');
    }
}

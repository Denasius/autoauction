<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('page_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('title')->nullable();
            $table->string('descr')->nullable();
            $table->integer('rating')->unsigned()->default(0);
            $table->timestamps();
        });

        Schema::table('page_comments', function ($table) {
            $table->foreign('page_id')->references('id')->on('pages');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_comments');
    }
}

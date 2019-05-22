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
            $table->bigIncrements('id');                    // идентификатор
            $table->string('title');                        // заголовок
            $table->string('slug');                         // слаг
            $table->text('text');                           // описание
            $table->string('vin')->nullable();              // VIN авто
            $table->string('tyres')->nullable();            // покрышки
            $table->integer('category_id')->nullable();     // идентификатор категории
            $table->integer('status')->default(0);          // статус - черновик/опубликованный
            $table->integer('views')->default(0);           // просмотры
            $table->integer('is_featured')->default(0);     // связанные, или рекомендаванные (пока не знаю, нужно использовать, или нет)
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

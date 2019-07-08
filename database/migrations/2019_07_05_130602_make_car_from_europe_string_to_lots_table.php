<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeCarFromEuropeStringToLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lots', function (Blueprint $table) {
            $table->string('lot_vip')->nullable()->change();
            $table->string('car_from_europe')->nullable()->change();
            $table->string('tax')->nullable()->change();
            $table->string('buy_one_click')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lots', function (Blueprint $table) {
            $table->string('lot_vip')->nullable()->change();
            $table->string('car_from_europe')->nullable()->change();
            $table->string('tax')->nullable()->change();
            $table->string('buy_one_click')->nullable()->change();
        });
    }
}

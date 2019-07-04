<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lots', function (Blueprint $table) {
            $table->float('price')->default(0)->unsigned();
            $table->string('currency')->default('BYN');
            $table->smallInteger('tax')->default(0);
            $table->smallInteger('buy_one_click')->default(0);
            $table->smallInteger('lot_vip')->default(0);
            $table->smallInteger('car_from_europe')->default(0);
            $table->float('shipping')->default(0);
            $table->float('fees')->default(0); // дополнительные сборы
            $table->integer('lot_step')->default(1)->unsigned();
            $table->date('lot_time')->nullable();
            $table->timestamp('lot_start')->nullable();
            $table->string('car_brend')->nullable();
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
            $table->dropColumn('price');
            $table->dropColumn('currency');
            $table->dropColumn('tax');
            $table->dropColumn('buy_one_click');
            $table->dropColumn('car_from_europe');
            $table->dropColumn('shipping');
            $table->dropColumn('fees');
            $table->dropColumn('lot_vip');
            $table->dropColumn('lot_step');
            $table->dropColumn('lot_time');
            $table->dropColumn('lot_start');
            $table->dropColumn('car_brend');
        });
    }
}

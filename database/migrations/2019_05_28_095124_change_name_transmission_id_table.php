<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNameTransmissionIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lot_transmissions', function (Blueprint $table) {
            $table->renameColumn('ntransmission_id', 'transmission_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lot_transmissions', function (Blueprint $table) {
            $table->renameColumn('ntransmission_id', 'transmission_id');
        });
    }
}

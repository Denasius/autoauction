<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('entity')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_surname')->nullable();
            $table->string('user_company')->nullable();
            $table->string('user_addres')->nullable();
            $table->string('user_addres_2')->nullable();
            $table->string('user_country')->nullable();
            $table->string('user_region')->nullable();
            $table->string('user_index')->nullable();
            $table->string('user_phone')->nullable();
            $table->date('user_dob')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

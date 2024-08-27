<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmergenciaFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nombre_emergencia')->nullable();
            $table->string('apellido_emergencia')->nullable();
            $table->string('identificacion_emergencia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nombre_emergencia');
            $table->dropColumn('apellido_emergencia');
            $table->dropColumn('identificacion_emergencia');
        });
    }
}

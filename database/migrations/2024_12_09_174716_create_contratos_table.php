<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->string('estatus');
            $table->bigInteger('residente_id');
            $table->bigInteger('habitacion_id');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->double('deposito_num');
            $table->string('deposito_text');
            $table->double('renta_num');
            $table->string('renta_text');
            $table->string('firma')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('contratos');
    }
}

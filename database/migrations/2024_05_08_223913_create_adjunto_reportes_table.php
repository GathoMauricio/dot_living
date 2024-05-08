<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdjuntoReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjunto_reportes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('autor_id');
            $table->bigInteger('reporte_id');
            $table->string('ruta');
            $table->string('descripcion')->nullable();
            $table->string('mimetype')->nullable();
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
        Schema::dropIfExists('adjunto_reportes');
    }
}

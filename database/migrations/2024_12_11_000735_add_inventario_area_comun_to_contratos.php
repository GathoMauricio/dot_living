<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInventarioAreaComunToContratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->string('estatus_cama');
            $table->string('observaciones_cama')->nullable();
            $table->string('estatus_colchon');
            $table->string('observaciones_colchon')->nullable();
            $table->string('estatus_focos');
            $table->string('observaciones_focos')->nullable();
            $table->string('estatus_ventana_vidrios');
            $table->string('observaciones_ventana_vidrios')->nullable();
            $table->string('estatus_pintura');
            $table->string('observaciones_pintura')->nullable();
            $table->string('estatus_perforacion_pared');
            $table->string('observaciones_perforacion_pared')->nullable();
            $table->string('estatus_puertas_rayones');
            $table->string('observaciones_puertas_rayones')->nullable();
            $table->string('estatus_chapa');
            $table->string('observaciones_chapa')->nullable();
            $table->string('estatus_juego_llaves');
            $table->string('observaciones_juego_llaves')->nullable();
            $table->string('estatus_regadera_fugas');
            $table->string('observaciones_regadera_fugas')->nullable();
            $table->string('estatus_taza_bano_roturas');
            $table->string('observaciones_taza_bano_roturas')->nullable();
            $table->string('estatus_lavabo_roturas');
            $table->string('observaciones_lavabo_roturas')->nullable();
            $table->string('estatus_chapa_ventana');
            $table->string('observaciones_chapa_ventana')->nullable();
            $table->string('estatus_enchufes');
            $table->string('observaciones_enchufes')->nullable();
            $table->string('estatus_apagadores');
            $table->string('observaciones_apagadores')->nullable();
            $table->string('estatus_cortinas');
            $table->string('observaciones_cortinas')->nullable();
            $table->string('estatus_mueble_ropa');
            $table->string('observaciones_mueble_ropa')->nullable();
            $table->string('notas');
            $table->string('estatus_access_point');
            $table->string('observaciones_access_point')->nullable();
            $table->string('estatus_internet');
            $table->string('observaciones_internet')->nullable();
            $table->string('estatus_television');
            $table->string('observaciones_television')->nullable();
            $table->string('estatus_sala');
            $table->string('observaciones_sala')->nullable();
            $table->string('estatus_menaje_cocina');
            $table->string('observaciones_menaje_cocina')->nullable();
            $table->string('estatus_refrigerador');
            $table->string('observaciones_refrigerador')->nullable();
            $table->string('estatus_horno_microondas');
            $table->string('observaciones_horno_microondas')->nullable();
            $table->string('estatus_estufa');
            $table->string('observaciones_estufa')->nullable();
            $table->string('estatus_lavadora');
            $table->string('observaciones_lavadora')->nullable();
            $table->string('estatus_area_tendido');
            $table->string('observaciones_area_tendido')->nullable();
            $table->string('estatus_video_vigilancia');
            $table->string('observaciones_video_vigilancia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->dropColumn('estatus_cama');
            $table->dropColumn('observaciones_cama');
            $table->dropColumn('estatus_colchon');
            $table->dropColumn('observaciones_colchon');
            $table->dropColumn('estatus_focos');
            $table->dropColumn('observaciones_focos');
            $table->dropColumn('estatus_ventana_vidrios');
            $table->dropColumn('observaciones_ventana_vidrios');
            $table->dropColumn('estatus_pintura');
            $table->dropColumn('observaciones_pintura');
            $table->dropColumn('estatus_perforacion_pared');
            $table->dropColumn('observaciones_perforacion_pared');
            $table->dropColumn('estatus_puertas_rayones');
            $table->dropColumn('observaciones_puertas_rayones');
            $table->dropColumn('estatus_chapa');
            $table->dropColumn('observaciones_chapa');
            $table->dropColumn('estatus_juego_llaves');
            $table->dropColumn('observaciones_juego_llaves');
            $table->dropColumn('estatus_regadera_fugas');
            $table->dropColumn('observaciones_regadera_fugas');
            $table->dropColumn('estatus_taza_bano_roturas');
            $table->dropColumn('observaciones_taza_bano_roturas');
            $table->dropColumn('estatus_lavabo_roturas');
            $table->dropColumn('observaciones_lavabo_roturas');
            $table->dropColumn('estatus_chapa_ventana');
            $table->dropColumn('observaciones_chapa_ventana');
            $table->dropColumn('estatus_enchufes');
            $table->dropColumn('observaciones_enchufes');
            $table->dropColumn('estatus_apagadores');
            $table->dropColumn('observaciones_apagadores');
            $table->dropColumn('estatus_cortinas');
            $table->dropColumn('observaciones_cortinas');
            $table->dropColumn('estatus_mueble_ropa');
            $table->dropColumn('observaciones_mueble_ropa');
            $table->dropColumn('notas');
            $table->dropColumn('estatus_access_point');
            $table->dropColumn('observaciones_access_point');
            $table->dropColumn('estatus_internet');
            $table->dropColumn('observaciones_internet');
            $table->dropColumn('estatus_television');
            $table->dropColumn('observaciones_television');
            $table->dropColumn('estatus_sala');
            $table->dropColumn('observaciones_sala');
            $table->dropColumn('estatus_menaje_cocina');
            $table->dropColumn('observaciones_menaje_cocina');
            $table->dropColumn('estatus_refrigerador');
            $table->dropColumn('observaciones_refrigerador');
            $table->dropColumn('estatus_horno_microondas');
            $table->dropColumn('observaciones_horno_microondas');
            $table->dropColumn('estatus_estufa');
            $table->dropColumn('observaciones_estufa');
            $table->dropColumn('estatus_lavadora');
            $table->dropColumn('observaciones_lavadora');
            $table->dropColumn('estatus_area_tendido');
            $table->dropColumn('observaciones_area_tendido');
            $table->dropColumn('estatus_video_vigilancia');
            $table->dropColumn('observaciones_video_vigilancia');
        });
    }
}

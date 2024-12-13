<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contrato extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contratos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'estatus',
        'residente_id',
        'habitacion_id',
        'fecha_inicio',
        'fecha_fin',
        'deposito_num',
        'deposito_text',
        'renta_num',
        'renta_text',
        'firma',
        'estatus_cama',
        'observaciones_cama',
        'estatus_colchon',
        'observaciones_colchon',
        'estatus_focos',
        'observaciones_focos',
        'estatus_ventana_vidrios',
        'observaciones_ventana_vidrios',
        'estatus_pintura',
        'observaciones_pintura',
        'estatus_perforacion_pared',
        'observaciones_perforacion_pared',
        'estatus_puertas_rayones',
        'observaciones_puertas_rayones',
        'estatus_chapa',
        'observaciones_chapa',
        'estatus_juego_llaves',
        'observaciones_juego_llaves',
        'estatus_regadera_fugas',
        'observaciones_regadera_fugas',
        'estatus_taza_bano_roturas',
        'observaciones_taza_bano_roturas',
        'estatus_lavabo_roturas',
        'observaciones_lavabo_roturas',
        'estatus_chapa_ventana',
        'observaciones_chapa_ventana',
        'estatus_enchufes',
        'observaciones_enchufes',
        'estatus_apagadores',
        'observaciones_apagadores',
        'estatus_cortinas',
        'observaciones_cortinas',
        'estatus_mueble_ropa',
        'observaciones_mueble_ropa',
        'notas',
        'estatus_access_point',
        'observaciones_access_point',
        'estatus_internet',
        'observaciones_internet',
        'estatus_television',
        'observaciones_television',
        'estatus_sala',
        'observaciones_sala',
        'estatus_menaje_cocina',
        'observaciones_menaje_cocina',
        'estatus_refrigerador',
        'observaciones_refrigerador',
        'estatus_horno_microondas',
        'observaciones_horno_microondas',
        'estatus_estufa',
        'observaciones_estufa',
        'estatus_lavadora',
        'observaciones_lavadora',
        'estatus_area_tendido',
        'observaciones_area_tendido',
        'estatus_video_vigilancia',
        'observaciones_video_vigilancia',
    ];

    public function residente()
    {
        return $this->belongsTo(
            'App\Models\User',
            'residente_id',
            'id'
        )
            ->withDefault();
    }

    public function habitacion()
    {
        return $this->belongsTo(
            'App\Models\Habitacion',
            'habitacion_id',
            'id'
        )
            ->withDefault();
    }
}

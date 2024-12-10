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

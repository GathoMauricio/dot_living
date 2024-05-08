<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $table = 'reportes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'estatus_id',
        'residente_id',
        'tipo_id',
        'descripcion',
    ];

    public function estatus()
    {
        return $this->belongsTo(
            'App\Models\EstatusReporte',
            'estatus_id',
            'id'
        )
            ->withDefault();
    }

    public function residente()
    {
        return $this->belongsTo(
            'App\Models\User',
            'residente_id',
            'id'
        )
            ->withDefault();
    }

    public function tipo()
    {
        return $this->belongsTo(
            'App\Models\TipoReporte',
            'tipo_id',
            'id'
        )
            ->withDefault();
    }
}

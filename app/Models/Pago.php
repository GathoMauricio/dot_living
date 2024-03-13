<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'estatus_id',
        'residente_id',
        'tipo_id',
        'comprobante',
        'descripcion',
        'fecha',
        'cantidad',
    ];

    public function estatus()
    {
        return $this->belongsTo(
            'App\Models\EstatusPago',
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
            'App\Models\TipoPago',
            'tipo_id',
            'id'
        )
            ->withDefault();
    }
}

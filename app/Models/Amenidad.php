<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenidad extends Model
{
    use HasFactory;

    protected $table = 'amenidades';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'estatus_id',
        'residente_id',
        'tipo_id',
        'fecha',
        'descripcion',
    ];

    public function estatus()
    {
        return $this->belongsTo(
            'App\Models\EstatusAmenidad',
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
            'App\Models\TipoAmenidad',
            'tipo_id',
            'id'
        )
            ->withDefault();
    }

    public function seguimientos()
    {
        return $this->hasMany('App\Models\SeguimientoAmenidad', 'amenidad_id');
    }
}

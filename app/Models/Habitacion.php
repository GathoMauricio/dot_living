<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    protected $table = 'habitaciones';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'residencia_id',
        'residente_id',
        'alias',
        'medidas',
        'renta',
        'deposito',
        'descripcion'
    ];

    public function residencia()
    {
        return $this->belongsTo(
            'App\Models\Residencia',
            'residencia_id',
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
        );
    }

    public function medios()
    {
        return $this->hasMany('App\Models\MediaHabitacion', 'habitacion_id');
    }

    public function mensajes()
    {
        return $this->hasMany('App\Models\Mensajeria', 'habitacion_id');
    }
}

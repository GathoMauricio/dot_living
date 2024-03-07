<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaHabitacion extends Model
{
    use HasFactory;

    protected $table = 'media_habitaciones';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'habitacion_id',
        'ruta',
        'descripcion'
    ];

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

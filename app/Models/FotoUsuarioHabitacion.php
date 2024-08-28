<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoUsuarioHabitacion extends Model
{
    use HasFactory;

    protected $table = 'usuario_habitacion_fotos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'tipo_id',
        'usuario_id',
        'foto',
        'descripcion',
    ];

    public function tipo()
    {
        return $this->belongsTo(
            'App\Models\TipoFotoUsuarioHabitacion',
            'tipo_id',
            'id'
        );
    }

    public function usuario()
    {
        return $this->belongsTo(
            'App\Models\User',
            'usuario_id',
            'id'
        );
    }
}

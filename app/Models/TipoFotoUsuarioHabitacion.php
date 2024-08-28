<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoFotoUsuarioHabitacion extends Model
{
    use HasFactory;

    protected $table = 'foto_usuario_habitacion_tipos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['tipo'];
}

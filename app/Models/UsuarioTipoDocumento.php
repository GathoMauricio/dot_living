<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioTipoDocumento extends Model
{
    use HasFactory;

    protected $table = 'usuario_documento_tipos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'tipo'
    ];
}

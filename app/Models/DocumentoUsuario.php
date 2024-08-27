<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoUsuario extends Model
{
    use HasFactory;

    protected $table = 'usuario_documentos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'tipo_id',
        'usuario_id',
        'extension',
        'archivo',
    ];

    public function usuario()
    {
        return $this->belongsTo(
            'App\Models\User',
            'usuario_id',
            'id'
        )
            ->withDefault();
    }

    public function tipo()
    {
        return $this->belongsTo(
            'App\Models\UsuarioTipoDocumento',
            'tipo_id',
            'id'
        )
            ->withDefault();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mensaje extends Model
{
    use HasFactory; //, SoftDeletes;

    protected $table = 'mensajes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'conversacion_id',
        'usuario_id',
        'tipo',
        'texto',
        'imagen'
    ];

    public function conversacion()
    {
        return $this->belongsTo(
            'App\Models\User',
            'conversacion_id',
            'id'
        )
            ->withDefault();
    }

    public function usuario()
    {
        return $this->belongsTo(
            'App\Models\User',
            'usuario_id',
            'id'
        )
            ->withDefault();
    }
}

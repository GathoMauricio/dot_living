<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversacion extends Model
{
    use HasFactory;

    protected $table = 'conversaciones';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'residente_id',
        'asunto',
    ];

    public function residente()
    {
        return $this->belongsTo(
            'App\Models\User',
            'residente_id',
            'id'
        )
            ->withDefault();
    }

    public function mensajes()
    {
        return $this->hasMany('App\Models\Mensaje', 'conversacion_id');
    }
}

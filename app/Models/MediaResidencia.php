<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaResidencia extends Model
{
    use HasFactory;

    protected $table = 'media_residencias';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'residencia_id',
        'ruta',
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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoReporte extends Model
{
    use HasFactory;

    protected $table = 'tipo_reportes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nombre'
    ];
}

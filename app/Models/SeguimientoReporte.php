<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeguimientoReporte extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'seguimiento_reportes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['autor_id', 'reporte_id', 'texto'];

    public function autor()
    {
        return $this->belongsTo(
            'App\Models\User',
            'autor_id',
            'id'
        )
            ->withDefault();
    }

    public function reporte()
    {
        return $this->belongsTo(
            'App\Models\Reporte',
            'reporte_id',
            'id'
        )
            ->withDefault();
    }
}

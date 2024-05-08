<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatusReporte extends Model
{
    use HasFactory;

    protected $table = 'estatus_reportes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nombre'
    ];
}

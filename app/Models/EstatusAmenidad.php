<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatusAmenidad extends Model
{
    use HasFactory;

    protected $table = 'estatus_amenidades';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nombre'
    ];
}

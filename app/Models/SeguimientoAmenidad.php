<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeguimientoAmenidad extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'seguimiento_amenidades';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['autor_id', 'amenidad_id', 'texto'];

    public function autor()
    {
        return $this->belongsTo(
            'App\Models\User',
            'autor_id',
            'id'
        )
            ->withDefault();
    }

    public function amenidad()
    {
        return $this->belongsTo(
            'App\Models\Amenidad',
            'amenidad_id',
            'id'
        )
            ->withDefault();
    }
}

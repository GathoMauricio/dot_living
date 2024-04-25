<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tablero extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'tableros';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'residencia_id',
        'autor_id',
        'tipo',
        'texto',
        'imagen'
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

    public function autor()
    {
        return $this->belongsTo(
            'App\Models\User',
            'autor_id',
            'id'
        )
            ->withDefault();
    }

}

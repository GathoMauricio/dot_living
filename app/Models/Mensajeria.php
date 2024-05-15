<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mensajeria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mensajerias';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'autor_id',
        'receptor_id',
        'tipo',
        'texto',
        'imagen'
    ];

    public function autor()
    {
        return $this->belongsTo(
            'App\Models\User',
            'autor_id',
            'id'
        )
            ->withDefault();
    }

    public function receptor()
    {
        return $this->belongsTo(
            'App\Models\User',
            'receptor_id',
            'id'
        )
            ->withDefault();
    }
}

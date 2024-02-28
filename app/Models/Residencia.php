<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
{
    use HasFactory;

    protected $table = 'residencias';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'auditor_id',
        'nombre',
        'telefono',
        'email',
        'direccion',
    ];

    public function auditor()
    {
        return $this->belongsTo(
            'App\Models\User',
            'auditor_id',
            'id'
        )
            ->withDefault();
    }
}
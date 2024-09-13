<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles,HasApiTokens;

    protected $fillable = [
        'id',
        'name',
        'apaterno',
        'amaterno',
        'telefono',
        'ocupacion',
        'nombre_emergencia',
        'apellido_emergencia',
        'telefono_emergencia',
        'identificacion_emergencia',
        'foto',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function habitacion()
    {
        return $this->hasOne('App\Models\Habitacion', 'residente_id', 'id');//->withDefault();
    }

    public function documentos()
    {
        return $this->hasMany('App\Models\DocumentoUsuario', 'usuario_id');
    }

    public function fotos_habitacion()
    {
        return $this->hasMany('App\Models\FotoUsuarioHabitacion', 'usuario_id')->orderBy('tipo_id');
    }
}

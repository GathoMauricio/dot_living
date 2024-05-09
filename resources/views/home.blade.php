@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-info">Inicio</h5>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                @can('modulo_roles_permisos')
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="{{ route('roles_permisos') }}">
                                                    Roles y permisos
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <img src="{{ asset('img/roles_permisos.png') }}"
                                                    alt="{{ asset('img/roles_permisos.png') }}" width="100%" height="200">
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                @can('modulo_usuarios')
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="{{ route('usuarios') }}">
                                                    Usuarios
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <img src="{{ asset('img/usuarios.png') }}" alt="{{ asset('img/usuarios.png') }}"
                                                    width="100%" height="200">
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                @can('modulo_residencias')
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="{{ route('residencias') }}">
                                                    Residencias
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <img src="{{ asset('img/residencias.png') }}"
                                                    alt="{{ asset('img/residencias.png') }}" width="100%" height="200">
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                @can('modulo_habitaciones')
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="{{ route('habitaciones') }}">
                                                    Habitaciones
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <img src="{{ asset('img/habitaciones.png') }}"
                                                    alt="{{ asset('img/habitaciones.png') }}" width="100%" height="200">
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                @can('modulo_pagos')
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="{{ route('pagos') }}">
                                                    Pagos
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <img src="{{ asset('img/pagos.png') }}" alt="{{ asset('img/pagos.png') }}"
                                                    width="100%" height="200">
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                @can('modulo_reportes')
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="{{ route('reportes') }}">
                                                    Reportes
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <img src="{{ asset('img/reportes.png') }}"
                                                    alt="{{ asset('img/reportes.png') }}" width="100%" height="200">
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                {{--  @can('modulo_amenidades')
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="{{ route('amenidades') }}">
                                                    Amenidades
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <img src="{{ asset('img/amenidades.png') }}"
                                                    alt="{{ asset('img/amenidades.png') }}" width="100%" height="200">
                                            </div>
                                        </div>
                                    </div>
                                @endcan  --}}
                                {{--  @can('modulo_tablero')
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="{{ route('tablero') }}">
                                                    Tablero
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <img src="{{ asset('img/tablero.png') }}" alt="{{ asset('img/tablero.png') }}"
                                                    width="100%" height="200">
                                            </div>
                                        </div>
                                    </div>
                                @endcan  --}}
                                {{--  @can('modulo_mensajeria')
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="{{ route('mensajeria') }}">
                                                    Mansajeria
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <img src="{{ asset('img/mensajeria.png') }}"
                                                    alt="{{ asset('img/mensajeria.png') }}" width="100%" height="200">
                                            </div>
                                        </div>
                                    </div>
                                @endcan  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

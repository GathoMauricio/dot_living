<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);
// Route::get('/', function () {
//     if (Auth::check()) {
//         return redirect('home');
//     }
//     return view('auth.login');
// })->name('/');

Route::group(['middleware' => ['auth']], function () {
    //Home
    Route::view('home', 'home')->name('home');

    //Roles y permisos
    Route::get('roles_permisos', [App\Http\Controllers\RolesPermisosController::class, 'index'])->name('roles_permisos')->middleware('permission:modulo_roles_permisos');
    Route::post('actualizar_roles_permisos', [App\Http\Controllers\RolesPermisosController::class, 'updatePermisos'])->name('actualizar_roles_permisos')->middleware('permission:modulo_roles_permisos');

    //Usuarios
    Route::get('usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('usuarios')->middleware('permission:modulo_usuarios');

    //Residencias
    Route::get('residencias', [App\Http\Controllers\ResidenciaController::class, 'index'])->name('residencias')->middleware('permission:modulo_residencias');

    //Habitaciones
    Route::get('habitaciones', [App\Http\Controllers\HabitacionController::class, 'index'])->name('habitaciones')->middleware('permission:modulo_habitaciones');

    //Pagos
    Route::get('pagos', [App\Http\Controllers\PagoController::class, 'index'])->name('pagos')->middleware('permission:modulo_pagos');

    //Reportes
    Route::get('reportes', [App\Http\Controllers\ReporteController::class, 'index'])->name('reportes')->middleware('permission:modulo_reportes');

    //Amenidades
    Route::get('amenidades', [App\Http\Controllers\AmenidadController::class, 'index'])->name('amenidades')->middleware('permission:modulo_amenidades');

    //Tablero
    Route::get('tablero', [App\Http\Controllers\TableroController::class, 'index'])->name('tablero')->middleware('permission:modulo_tablero');

    //Mensajeria
    Route::get('mensajeria', [App\Http\Controllers\MensajeriaController::class, 'index'])->name('mensajeria')->middleware('permission:modulo_mensajeria');
});

Route::any('/', function () {
})->name('/');
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('home');
    }
    return view('auth.login');
})->name('/');

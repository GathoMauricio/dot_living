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
    Route::get('detalle_usuarios/{id?}', [App\Http\Controllers\UserController::class, 'show'])->name('detalle_usuarios')->middleware('permission:detalle_usuarios');
    Route::get('crear_usuarios', [App\Http\Controllers\UserController::class, 'create'])->name('crear_usuarios')->middleware('permission:crear_usuarios');
    Route::post('store_usuarios', [App\Http\Controllers\UserController::class, 'store'])->name('store_usuarios')->middleware('permission:crear_usuarios');
    Route::get('editar_usuarios/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('editar_usuarios')->middleware('permission:editar_usuarios');
    Route::put('update_usuarios/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update_usuarios')->middleware('permission:editar_usuarios');
    Route::delete('eliminar_usuarios/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('eliminar_usuarios')->middleware('permission:eliminar_usuarios');

    //Residencias
    Route::get('residencias', [App\Http\Controllers\ResidenciaController::class, 'index'])->name('residencias')->middleware('permission:modulo_residencias');
    Route::get('detalle_residencias/{id?}', [App\Http\Controllers\ResidenciaController::class, 'show'])->name('detalle_residencias')->middleware('permission:detalle_residencias');
    Route::get('crear_residencias', [App\Http\Controllers\ResidenciaController::class, 'create'])->name('crear_residencias')->middleware('permission:crear_residencias');
    Route::post('store_residencias', [App\Http\Controllers\ResidenciaController::class, 'store'])->name('store_residencias')->middleware('permission:crear_residencias');
    Route::get('editar_residencias/{id}', [App\Http\Controllers\ResidenciaController::class, 'edit'])->name('editar_residencias')->middleware('permission:editar_residencias');
    Route::put('update_residencias/{id}', [App\Http\Controllers\ResidenciaController::class, 'update'])->name('update_residencias')->middleware('permission:editar_residencias');
    Route::delete('eliminar_residencias/{id}', [App\Http\Controllers\ResidenciaController::class, 'destroy'])->name('eliminar_residencias')->middleware('permission:eliminar_residencias');


    //Habitaciones
    Route::get('habitaciones', [App\Http\Controllers\HabitacionController::class, 'index'])->name('habitaciones')->middleware('permission:modulo_habitaciones');
    Route::get('detalle_habitaciones/{id?}', [App\Http\Controllers\HabitacionController::class, 'show'])->name('detalle_habitaciones')->middleware('permission:detalle_habitaciones');
    Route::get('crear_habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'create'])->name('crear_habitaciones')->middleware('permission:crear_habitaciones');
    Route::post('store_habitaciones', [App\Http\Controllers\HabitacionController::class, 'store'])->name('store_habitaciones')->middleware('permission:crear_habitaciones');
    Route::get('editar_habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'edit'])->name('editar_habitaciones')->middleware('permission:editar_habitaciones');
    Route::put('update_habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'update'])->name('update_habitaciones')->middleware('permission:editar_habitaciones');
    Route::delete('eliminar_habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'destroy'])->name('eliminar_habitaciones')->middleware('permission:eliminar_habitaciones');

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

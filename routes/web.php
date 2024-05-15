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
    //Route::get('crear_media_residencias', [App\Http\Controllers\ResidenciaController::class, 'create_media'])->name('crear_media_residencias')->middleware('permission:crear_media_residencias');

    //MediaResidencias

    //Habitaciones
    Route::get('habitaciones', [App\Http\Controllers\HabitacionController::class, 'index'])->name('habitaciones')->middleware('permission:modulo_habitaciones');
    Route::get('detalle_habitaciones/{id?}', [App\Http\Controllers\HabitacionController::class, 'show'])->name('detalle_habitaciones')->middleware('permission:detalle_habitaciones');
    Route::get('crear_habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'create'])->name('crear_habitaciones')->middleware('permission:crear_habitaciones');
    Route::post('store_habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'store'])->name('store_habitaciones')->middleware('permission:crear_habitaciones');
    Route::get('editar_habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'edit'])->name('editar_habitaciones')->middleware('permission:editar_habitaciones');
    Route::put('update_habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'update'])->name('update_habitaciones')->middleware('permission:editar_habitaciones');
    Route::delete('eliminar_habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'destroy'])->name('eliminar_habitaciones')->middleware('permission:eliminar_habitaciones');

    //MediosResidencias
    Route::post('store_media_residencias/{id}', [App\Http\Controllers\MediaResidenciaController::class, 'store'])->name('store_media_residencias')->middleware('permission:crear_medio_residencias');
    Route::delete('delete_media_residencias/{id}', [App\Http\Controllers\MediaResidenciaController::class, 'destroy'])->name('delete_media_residencias')->middleware('permission:eliminar_medio_residencias');

    //MediasHabitaciones
    Route::post('store_media_habitaciones/{id}', [App\Http\Controllers\MediaHabitacionController::class, 'store'])->name('store_media_habitaciones')->middleware('permission:crear_medio_habitaciones');
    Route::delete('delete_media_habitaciones/{id}', [App\Http\Controllers\MediaHabitacionController::class, 'destroy'])->name('delete_media_habitaciones')->middleware('permission:eliminar_medio_habitaciones');

    //Pagos
    Route::get('pagos', [App\Http\Controllers\PagoController::class, 'index'])->name('pagos')->middleware('permission:modulo_pagos');
    Route::get('detalle_pagos/{id?}', [App\Http\Controllers\PagoController::class, 'show'])->name('detalle_pagos')->middleware('permission:detalle_pagos');
    Route::get('crear_pagos', [App\Http\Controllers\PagoController::class, 'create'])->name('crear_pagos')->middleware('permission:crear_pagos');
    Route::post('store_pagos', [App\Http\Controllers\PagoController::class, 'store'])->name('store_pagos')->middleware('permission:crear_pagos');
    Route::get('editar_pagos/{id}', [App\Http\Controllers\PagoController::class, 'edit'])->name('editar_pagos')->middleware('permission:editar_pagos');
    Route::put('update_pagos/{id}', [App\Http\Controllers\PagoController::class, 'update'])->name('update_pagos')->middleware('permission:editar_pagos');
    Route::delete('eliminar_pagos/{id}', [App\Http\Controllers\PagoController::class, 'destroy'])->name('eliminar_pagos')->middleware('permission:eliminar_pagos');
    Route::post('cargar_comprobante_pagos', [App\Http\Controllers\PagoController::class, 'cargarComprobante'])->name('cargar_comprobante_pagos')->middleware('permission:cargar_comprobante_pagos');
    Route::get('cargar_cantidad_pago', [App\Http\Controllers\PagoController::class, 'cargarCantidad'])->name('cargar_cantidad_pago');

    //Reportes
    Route::get('reportes', [App\Http\Controllers\ReporteController::class, 'index'])->name('reportes')->middleware('permission:modulo_reportes');
    Route::get('crear_reportes', [App\Http\Controllers\ReporteController::class, 'create'])->name('crear_reportes')->middleware('permission:crear_reportes');
    Route::post('store_reportes', [App\Http\Controllers\ReporteController::class, 'store'])->name('store_reportes')->middleware('permission:crear_reportes');
    Route::get('detalle_reportes/{id}', [App\Http\Controllers\ReporteController::class, 'show'])->name('detalle_reportes')->middleware('permission:detalle_reportes');
    Route::put('canbiar_estatus_reporte/{id}', [App\Http\Controllers\ReporteController::class, 'cambiarEstatus'])->name('canbiar_estatus_reporte')->middleware('permission:detalle_reportes');

    //Adjunto Reporte
    Route::post('store_adjunto_reporte', [App\Http\Controllers\AdjuntoReporteController::class, 'store'])->name('store_adjunto_reporte')->middleware('permission:crear_reportes');

    //Seguimiento Reporte
    Route::post('store_seguimiento_reporte', [App\Http\Controllers\SeguimientoReporteController::class, 'store'])->name('store_seguimiento_reporte')->middleware('permission:detalle_reportes');

    //Amenidades
    Route::get('amenidades', [App\Http\Controllers\AmenidadController::class, 'index'])->name('amenidades')->middleware('permission:modulo_amenidades');

    //Tablero
    Route::get('tablero/{id?}', [App\Http\Controllers\TableroController::class, 'index'])->name('tablero')->middleware('permission:modulo_tablero');
    Route::post('store_tablero_residencias/{id}', [App\Http\Controllers\TableroController::class, 'store'])->name('store_tablero_residencias');
    //Mensajeria
    Route::get('mensajeria', [App\Http\Controllers\MensajeriaController::class, 'index'])->name('mensajeria')->middleware('permission:modulo_mensajeria');
    Route::post('store_mensajeria', [App\Http\Controllers\MensajeriaController::class, 'store'])->name('store_mensajeria')->middleware('permission:modulo_mensajeria');


    //Tipo de reporte
    Route::get('tipo_reporte', [App\Http\Controllers\TipoReporteController::class, 'index'])->name('tipo_reporte')->middleware('permission:modulo_tipo_reporte');
    Route::get('create_reporte', [App\Http\Controllers\TipoReporteController::class, 'create'])->name('create_reporte')->middleware('permission:modulo_tipo_reporte');
    Route::post('store_reporte', [App\Http\Controllers\TipoReporteController::class, 'store'])->name('store_reporte')->middleware('permission:modulo_tipo_reporte');
    Route::get('edit_reporte/{id}', [App\Http\Controllers\TipoReporteController::class, 'edit'])->name('edit_reporte')->middleware('permission:modulo_tipo_reporte');
    Route::put('update_reporte/{id}', [App\Http\Controllers\TipoReporteController::class, 'update'])->name('update_reporte')->middleware('permission:modulo_tipo_reporte');
    Route::delete('delete_reporte/{id}', [App\Http\Controllers\TipoReporteController::class, 'destroy'])->name('delete_reporte')->middleware('permission:modulo_tipo_reporte');
});

Route::any('/', function () {
})->name('/');
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('home');
    }
    return view('auth.login');
})->name('/');

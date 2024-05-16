<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('habitaciones', [App\Http\Controllers\HabitacionController::class, 'index'])->name('habitaciones')->middleware('permission:modulo_habitaciones');
    Route::get('detalle_habitaciones/{id?}', [App\Http\Controllers\HabitacionController::class, 'show'])->name('detalle_habitaciones')->middleware('permission:detalle_habitaciones');
    Route::get('crear_habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'create'])->name('crear_habitaciones')->middleware('permission:crear_habitaciones');
    Route::post('store_habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'store'])->name('store_habitaciones')->middleware('permission:crear_habitaciones');
    Route::get('editar_habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'edit'])->name('editar_habitaciones')->middleware('permission:editar_habitaciones');
    Route::put('update_habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'update'])->name('update_habitaciones')->middleware('permission:editar_habitaciones');
    Route::delete('eliminar_habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'destroy'])->name('eliminar_habitaciones')->middleware('permission:eliminar_habitaciones');
    Route::post('store_media_residencias/{id}', [App\Http\Controllers\MediaResidenciaController::class, 'store'])->name('store_media_residencias')->middleware('permission:crear_medio_residencias');
    Route::delete('delete_media_residencias/{id}', [App\Http\Controllers\MediaResidenciaController::class, 'destroy'])->name('delete_media_residencias')->middleware('permission:eliminar_medio_residencias');
    Route::post('store_media_habitaciones/{id}', [App\Http\Controllers\MediaHabitacionController::class, 'store'])->name('store_media_habitaciones')->middleware('permission:crear_medio_habitaciones');
    Route::delete('delete_media_habitaciones/{id}', [App\Http\Controllers\MediaHabitacionController::class, 'destroy'])->name('delete_media_habitaciones')->middleware('permission:eliminar_medio_habitaciones');
});

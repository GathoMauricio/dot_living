<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('residencias', [App\Http\Controllers\ResidenciaController::class, 'index'])->name('residencias')->middleware('permission:modulo_residencias');
    Route::get('detalle_residencias/{id?}', [App\Http\Controllers\ResidenciaController::class, 'show'])->name('detalle_residencias')->middleware('permission:detalle_residencias');
    Route::get('crear_residencias', [App\Http\Controllers\ResidenciaController::class, 'create'])->name('crear_residencias')->middleware('permission:crear_residencias');
    Route::post('store_residencias', [App\Http\Controllers\ResidenciaController::class, 'store'])->name('store_residencias')->middleware('permission:crear_residencias');
    Route::get('editar_residencias/{id}', [App\Http\Controllers\ResidenciaController::class, 'edit'])->name('editar_residencias')->middleware('permission:editar_residencias');
    Route::put('update_residencias/{id}', [App\Http\Controllers\ResidenciaController::class, 'update'])->name('update_residencias')->middleware('permission:editar_residencias');
    Route::delete('eliminar_residencias/{id}', [App\Http\Controllers\ResidenciaController::class, 'destroy'])->name('eliminar_residencias')->middleware('permission:eliminar_residencias');
});

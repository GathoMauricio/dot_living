<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('amenidades', [App\Http\Controllers\AmenidadController::class, 'index'])->name('amenidades')->middleware('permission:modulo_amenidades');
    Route::get('crear_amenidad', [App\Http\Controllers\AmenidadController::class, 'create'])->name('crear_amenidad')->middleware('permission:crear_amenidad');
    Route::post('store_amenidad', [App\Http\Controllers\AmenidadController::class, 'store'])->name('store_amenidad')->middleware('permission:crear_amenidad');
    Route::get('detalle_amenidad/{id}', [App\Http\Controllers\AmenidadController::class, 'show'])->name('detalle_amenidad')->middleware('permission:detalle_amenidad');
    Route::put('canbiar_estatus_amenidad/{id}', [App\Http\Controllers\AmenidadController::class, 'cambiarEstatus'])->name('canbiar_estatus_amenidad')->middleware('permission:detalle_amenidad');
    Route::post('store_seguimiento_amenidad', [App\Http\Controllers\SeguimientoAmenidadController::class, 'store'])->name('store_seguimiento_amenidad')->middleware('permission:detalle_amenidad');
    // Route::get('tipo_amenidad', [App\Http\Controllers\TipoAmenidadController::class, 'index'])->name('tipo_amenidad')->middleware('permission:modulo_tipo_amenidad');
    // Route::get('create_amenidad', [App\Http\Controllers\TipoAmenidadController::class, 'create'])->name('create_amenidad')->middleware('permission:modulo_tipo_amenidad');
    // Route::post('store_amenidad', [App\Http\Controllers\TipoAmenidadController::class, 'store'])->name('store_amenidad')->middleware('permission:modulo_tipo_amenidad');
    // Route::get('edit_amenidad/{id}', [App\Http\Controllers\TipoAmenidadController::class, 'edit'])->name('edit_amenidad')->middleware('permission:modulo_tipo_amenidad');
    // Route::put('update_amenidad/{id}', [App\Http\Controllers\TipoAmenidadController::class, 'update'])->name('update_amenidad')->middleware('permission:modulo_tipo_amenidad');
    // Route::delete('delete_amenidad/{id}', [App\Http\Controllers\TipoAmenidadController::class, 'destroy'])->name('delete_amenidad')->middleware('permission:modulo_tipo_amenidad');
});

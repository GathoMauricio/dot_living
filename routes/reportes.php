<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('reportes', [App\Http\Controllers\ReporteController::class, 'index'])->name('reportes')->middleware('permission:modulo_reportes');
    Route::get('crear_reportes', [App\Http\Controllers\ReporteController::class, 'create'])->name('crear_reportes')->middleware('permission:crear_reportes');
    Route::post('store_reportes', [App\Http\Controllers\ReporteController::class, 'store'])->name('store_reportes')->middleware('permission:crear_reportes');
    Route::get('detalle_reportes/{id}', [App\Http\Controllers\ReporteController::class, 'show'])->name('detalle_reportes')->middleware('permission:detalle_reportes');
    Route::put('canbiar_estatus_reporte/{id}', [App\Http\Controllers\ReporteController::class, 'cambiarEstatus'])->name('canbiar_estatus_reporte')->middleware('permission:detalle_reportes');
    Route::post('store_adjunto_reporte', [App\Http\Controllers\AdjuntoReporteController::class, 'store'])->name('store_adjunto_reporte')->middleware('permission:crear_reportes');
    Route::post('store_seguimiento_reporte', [App\Http\Controllers\SeguimientoReporteController::class, 'store'])->name('store_seguimiento_reporte')->middleware('permission:detalle_reportes');
    Route::get('tipo_reporte', [App\Http\Controllers\TipoReporteController::class, 'index'])->name('tipo_reporte')->middleware('permission:modulo_tipo_reporte');
    Route::get('create_reporte', [App\Http\Controllers\TipoReporteController::class, 'create'])->name('create_reporte')->middleware('permission:modulo_tipo_reporte');
    Route::post('store_reporte', [App\Http\Controllers\TipoReporteController::class, 'store'])->name('store_reporte')->middleware('permission:modulo_tipo_reporte');
    Route::get('edit_reporte/{id}', [App\Http\Controllers\TipoReporteController::class, 'edit'])->name('edit_reporte')->middleware('permission:modulo_tipo_reporte');
    Route::put('update_reporte/{id}', [App\Http\Controllers\TipoReporteController::class, 'update'])->name('update_reporte')->middleware('permission:modulo_tipo_reporte');
    Route::delete('delete_reporte/{id}', [App\Http\Controllers\TipoReporteController::class, 'destroy'])->name('delete_reporte')->middleware('permission:modulo_tipo_reporte');
});

<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('pagos', [App\Http\Controllers\PagoController::class, 'index'])->name('pagos')->middleware('permission:modulo_pagos');
    Route::get('detalle_pagos/{id?}', [App\Http\Controllers\PagoController::class, 'show'])->name('detalle_pagos')->middleware('permission:detalle_pagos');
    Route::get('crear_pagos', [App\Http\Controllers\PagoController::class, 'create'])->name('crear_pagos')->middleware('permission:crear_pagos');
    Route::post('store_pagos', [App\Http\Controllers\PagoController::class, 'store'])->name('store_pagos')->middleware('permission:crear_pagos');
    Route::get('editar_pagos/{id}', [App\Http\Controllers\PagoController::class, 'edit'])->name('editar_pagos')->middleware('permission:editar_pagos');
    Route::put('update_pagos/{id}', [App\Http\Controllers\PagoController::class, 'update'])->name('update_pagos')->middleware('permission:editar_pagos');
    Route::delete('eliminar_pagos/{id}', [App\Http\Controllers\PagoController::class, 'destroy'])->name('eliminar_pagos')->middleware('permission:eliminar_pagos');
    Route::post('cargar_comprobante_pagos', [App\Http\Controllers\PagoController::class, 'cargarComprobante'])->name('cargar_comprobante_pagos')->middleware('permission:cargar_comprobante_pagos');
    Route::get('cargar_cantidad_pago', [App\Http\Controllers\PagoController::class, 'cargarCantidad'])->name('cargar_cantidad_pago');
});

<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('tablero/{id?}', [App\Http\Controllers\TableroController::class, 'index'])->name('tablero')->middleware('permission:modulo_tablero');
    Route::post('store_tablero_residencias/{id}', [App\Http\Controllers\TableroController::class, 'store'])->name('store_tablero_residencias');
});

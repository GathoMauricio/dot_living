<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('mensajeria', [App\Http\Controllers\MensajeriaController::class, 'index'])->name('mensajeria')->middleware('permission:modulo_mensajeria');
    Route::post('store_mensajeria', [App\Http\Controllers\MensajeriaController::class, 'store'])->name('store_mensajeria')->middleware('permission:modulo_mensajeria');
});

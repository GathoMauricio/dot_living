<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('mensajeria', [App\Http\Controllers\MensajeriaController::class, 'index'])->name('mensajeria')->middleware('permission:modulo_mensajeria');
    Route::post('store_mensajeria', [App\Http\Controllers\MensajeriaController::class, 'store'])->name('store_mensajeria')->middleware('permission:modulo_mensajeria');

    Route::get('conversaciones', [App\Http\Controllers\ConversacionController::class, 'index'])->name('conversaciones')->middleware('permission:modulo_mensajeria');
    Route::post('store_conversacion', [App\Http\Controllers\ConversacionController::class, 'store'])->name('store_conversacion')->middleware('permission:modulo_mensajeria');
    Route::get('conversacion/{id}', [App\Http\Controllers\ConversacionController::class, 'show'])->name('conversacion')->middleware('permission:modulo_mensajeria');

    Route::post('store_mensaje', [App\Http\Controllers\ConversacionController::class, 'storeMensaje'])->name('store_mensaje')->middleware('permission:modulo_mensajeria');
});

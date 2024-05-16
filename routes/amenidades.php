<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('amenidades', [App\Http\Controllers\AmenidadController::class, 'index'])->name('amenidades')->middleware('permission:modulo_amenidades');
});

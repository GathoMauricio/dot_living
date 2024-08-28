<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('usuarios')->middleware('permission:modulo_usuarios');
    Route::get('detalle_usuarios/{id?}', [App\Http\Controllers\UserController::class, 'show'])->name('detalle_usuarios')->middleware('permission:detalle_usuarios');
    Route::get('crear_usuarios', [App\Http\Controllers\UserController::class, 'create'])->name('crear_usuarios')->middleware('permission:crear_usuarios');
    Route::post('store_usuarios', [App\Http\Controllers\UserController::class, 'store'])->name('store_usuarios')->middleware('permission:crear_usuarios');
    Route::get('editar_usuarios/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('editar_usuarios')->middleware('permission:editar_usuarios');
    Route::put('update_usuarios/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update_usuarios')->middleware('permission:editar_usuarios');
    Route::delete('eliminar_usuarios/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('eliminar_usuarios')->middleware('permission:eliminar_usuarios');
    Route::post('store_documento_usuarios', [App\Http\Controllers\UserController::class, 'storeDocumento'])->name('store_documento_usuarios')->middleware('permission:editar_usuarios');
});

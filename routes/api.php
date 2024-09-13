<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('api-login', [\App\Http\Controllers\UserController::class, 'apiLogin']);
//Route::get('api-solicitar-password', [\App\Http\Controllers\UserController::class, 'apiSolicitarPassword']);
Route::get('api-ultima-version-android', [\App\Http\Controllers\AppController::class, 'apiUltimaVersionAndroid']);
Route::get('api-descargar-android-app', [\App\Http\Controllers\AppController::class, 'descargarAndroidApp']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('api-datos-usuario', [\App\Http\Controllers\UserController::class, 'apiDatosUsuario']);
    Route::get('api-logout', [\App\Http\Controllers\UserController::class, 'apiLogout']);

});

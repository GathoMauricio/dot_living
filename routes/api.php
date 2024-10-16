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
    //Usuarios
    Route::get('api-datos-usuario', [\App\Http\Controllers\UserController::class, 'apiDatosUsuario']);
    Route::get('api-logout', [\App\Http\Controllers\UserController::class, 'apiLogout']);
    //Residencias
    Route::get('api-show-residencia', [\App\Http\Controllers\ResidenciaController::class, 'apiShowResidencia']);
    Route::get('api-index-media-residencia', [\App\Http\Controllers\MediaResidenciaController::class, 'apiIndexMediaResidencia']);
    //Habitaciones
    Route::get('api-show-habitacion', [\App\Http\Controllers\HabitacionController::class, 'apiShowHabitacion']);
    Route::get('api-index-media-habitacion', [\App\Http\Controllers\MediaHabitacionController::class, 'apiIndexMediaHabitacion']);
    //Pagos
    Route::get('api-index-pagos', [\App\Http\Controllers\PagoController::class, 'apiIndex']);
    Route::get('api-show-pago', [\App\Http\Controllers\PagoController::class, 'apiShow']);
    Route::post('api-adjuntar-comprobante-pago', [\App\Http\Controllers\PagoController::class, 'apiAdjuntarComprobante']);
    //Conversaciones
    Route::get('api-index-conversaciones', [\App\Http\Controllers\ConversacionController::class, 'apiIndexConversaciones']);
    Route::post('api-store-conversacion', [\App\Http\Controllers\ConversacionController::class, 'apiStoreConversacion']);
    Route::get('api-index-mensajes', [\App\Http\Controllers\ConversacionController::class, 'apiIndexMensajes']);
    Route::post('api-store-mensaje', [\App\Http\Controllers\ConversacionController::class, 'apiStoreMensaje']);
    //Notificaciones (Tableros)
    Route::get('api-index-notificaciones', [\App\Http\Controllers\TableroController::class, 'apiIndexNotificaciones']);
    Route::get('api-show-notificacion', [\App\Http\Controllers\TableroController::class, 'apiShowNotificacion']);
});

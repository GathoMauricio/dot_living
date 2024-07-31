<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);
Route::group(['middleware' => ['auth']], function () {
    Route::view('home', 'home')->name('home');
});
Route::any('/', function () {
})->name('/');
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('home');
    }
    return view('auth.login');
})->name('/');


// Route::get('test_ws', function () {

//     \Notification::send([], new App\Notifications\MovieTicketPaid());
//     return "Test para whatsapp";
// })->name('test_ws');

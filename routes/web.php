<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use NumberToWords\NumberToWords;

Auth::routes(['register' => false]);
Route::group(['middleware' => ['auth']], function () {
    Route::view('home', 'home')->name('home');
});
Route::any('/', function () {})->name('/');
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('home');
    }
    return view('auth.login');
})->name('/');


Route::get('test', function () {
    $numberToWords = new NumberToWords();
    $numberTransformer = $numberToWords->getNumberTransformer('es'); // 'es' para español

    $texto = $numberTransformer->toWords(1934544621321656446); // Resultado: "mil doscientos treinta y cuatro"
    echo $texto;
})->name('test');

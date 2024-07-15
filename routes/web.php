<?php

use Illuminate\Support\Facades\Route;
##  Depois fazer com que o endereço fique igual da views
Route::get('/', function () {
    if (Auth::check()) {
    return redirect()->route('index');
}
return view('welcome');
})->name('cadastrar');

Route::middleware(['auth'])->group(function () {
    Route::view('/index', 'index')->name('index');
    Route::view('post','poster')->name('envArq');
});
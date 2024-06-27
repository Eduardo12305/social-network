<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('cadastrar');

Route::middleware(['auth'])->group(function () {
    Route::view('/index', 'index')->name('index');

});
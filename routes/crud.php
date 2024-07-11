<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function (){
    Route::post('/','create' )->name("cre-post");

    Route::resource('/user', UserController::class);
});

// Route::post(UserController::class, 'create')->name('create');
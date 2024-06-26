<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function (){
    Route::view('/login','login')->name('login');

    Route::post("/login","login")->name('processoLogin');

    Route::post('/logout', 'logout')->name('logout');

    Route::delete('/deleteUser', 'deleteUser')->name('deleteUser')->middleware('auth:web');

});
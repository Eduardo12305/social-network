<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function (){
    Route::view('/login','login')->name('login');

    Route::post("/login","login")->name('processoLogin');

    Route::get('/logout', 'logout')->name('logout');


    Route::get('/dadosusuario/{user}','userdados')->name('userdados');
    

});

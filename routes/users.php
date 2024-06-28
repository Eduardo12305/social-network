<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//ADIMIN
Route::view("/Admin","adimin_creat")->name("admin");
// Route::post("/Admin","")->name("admin_process");

// 

Route::get("/login",function(){
    if(Auth::check()){
        return redirect("index");
    }
    return view("login");
})->name('login');


Route::controller(UserController::class)->group(function (){


    Route::post("/login","login")->name('processoLogin');

    Route::get('/logout', 'logout')->name('logout');

   
    

});

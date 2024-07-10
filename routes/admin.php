<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::view('admin/cadastrar','admin_creat')->name('admin_cadastro');
Route::view('admin/login','admin_login')->name('admin_login');
Route::controller(AdminController::class)->group(function (){
    Route::post('admin/cadastrar','create' )->name("cre-admin");


});

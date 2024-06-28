<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function create(Request $req) {
    //     $req->validate([
    //         'nome'=>'required|string',
    //         'email'=> 'required|email',
    //         'senha'=> 'required|string|min:6',
    //         'senhaC'=>'required|string|min:6',
    //      ]);
    //      $res = Admin::create([
    //         'name'=> $nome,
    //         'email' => $email,
    //         'password' => Hash::make($senha),
    //         'celular'=> $cel,
    //     ]);
        
        
    //     if ($res) {
    //         return redirect()->route('login');
    //     }else{
    //         return redirect()->route('welcome')->with('error', 'aaa');
    //     }
         
    // }
}

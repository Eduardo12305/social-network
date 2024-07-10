<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function create(AdminRequest $req)
    {
        $senha = $req->senha;
        $senhac = $req->senhaC;
        $name = $req->name;
        $username = $req->username;  
        
        
    //  Erro de senhas diferentes
    if($senha !== $senhac){
        return redirect()->route('admin-cadastro')->with(['senhaC'=>'As senhas não coincidem']);
    }
    $res = Admin::create([
        'name'=> $name,
        'username' => $username,
        'password' => Hash::make($senha),
    ]);
    
    // dd($req);
    
    if ($res) {
        return redirect()->route('admin_login');
    }else{
        return redirect()->route('admin_cadastro')->with('error', 'Não foi possivel cadrastar');
    }
}
}

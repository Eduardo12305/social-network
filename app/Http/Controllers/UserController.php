<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    
    public function index()
    {
        
    }

    
    public function create(Request $req)
    {
        $user = $req->all();
     $name = $user["nome"];
     $senha = $user["senha"];
     $email = $user["email"];

     $res = User::create([
        'name'=> $name,
        'email' => $email,
        'password' => Hash::make($senha),
    ]);

    if ($res) {
        return redirect()->route('login');
    }else{
        return redirect()->route('welcome')->with('error', 'aaa');
    }
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function show(string $id)
    {
        
    }

    
    public function edit(string $id)
    {
        
    }

    
    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }
}

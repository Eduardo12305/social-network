<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    
    
    public function login(Request $req){
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect()->route('index');
        }else{
            return redirect()->route('login')->with('error','Não foi possivel fazer login');
        }
    }
    
    public function logout(Request $req) {
        Auth::logout();
        
        $req->session()->invalidate();
        
        $req->session()->regenerateToken();
        
        return redirect('index');
        
    }

    

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

    
    public function store(Request $req)
    {
        
    }

    
    public function show(User $user)
    {
        
        return view('dadosuser', compact('user'));
    }

    
    public function edit(string $id)
    {
        
    }

    
    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(User $user)
    {
        $delete = $user->delete();

        if ($delete) {
            Auth::logout();
            return redirect('/')->with('success', 'Usuário deletado com sucesso.');
        } else {
            return redirect('/index')->with('error', 'Erro ao deletar usuário.');
        }
    }


}

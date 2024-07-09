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
            return redirect()->route('login')->with('error','Email ou senha incorretos');
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
    //  $user = $req->all();
      $req->validate([
        'nome'=>'required|string',
        'email'=> 'required|email',
        'senha'=> 'required|string|min:6',
        'senhaC'=>'required|string|min:6',
        'username'=> 'required|unique:users,username',
     ]);
     $validet=$req;
     $name = $validet["nome"];
     $email = $validet["email"];
    //  dd($name);
     $senha = $validet["senha"];   
     $senhac= $validet["senhaC"];
     $cel= $validet["cel"];
     $username= $validet["username"];

    //  Erro de senhas diferentes
    if($senha !== $senhac){
        return redirect()->back()->withErrors(['senhaC'=>'As senhas não coincidem']);
    }
    // Fim

    if($cel==null){
        $cel='00000000';
    } 

    if (strlen($cel) !== 8) {
       
        $cel = '00000000';
    }
    // Erro de username ja existe
    $existingUser = User::where('username', $username)->first();

    if ($existingUser) {
    return redirect()->back()->withErrors(['username' => 'Nome de usuário já registrado']);
    }
    // Fim

    
    
     $res = User::create([
        'name'=> $name,
        'email' => $email,
        'password' => Hash::make($senha),
        'celular'=> $cel,
        'username' => $username,
    ]);
    
    
    if ($res) {
        return redirect()->route('login');
    }else{
        return redirect()->route('welcome')->with('error', 'Não foi possivel cadrastar');
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
    // Validar os dados recebidos do formulário
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string', // assumindo que 'senha' e 'senhaC' são campos válidos
        'passwordNew' => 'required|string|min:6', // campo de confirmação de senha
    ]);

    // Buscar o usuário pelo ID fornecido
    $user = User::findOrFail($id);

    // Atualizar os dados do usuário com base nos dados recebidos
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('passwordNew')); // caso esteja utilizando criptografia para senha
    $user->celular = $request->input('cel');

    // Salvar as alterações no banco de dados
    $user->save();

    // Redirecionar de volta com mensagem de sucesso (opcional)
    return redirect()->route('cadastrar')->with('success', 'Dados atualizados com sucesso!');
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

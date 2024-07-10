<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    
    
    public function login(Request $req) {
        $req->validate([
            'emailOrusernameOrphone' => ['required'],
            'password' => ['required'],
        ]);
    
        $loginField = $req->input('emailOrusernameOrphone');
        $password = $req->input('password');
    
        // Verifica se o campo de login é um email válido
        $credentials = filter_var($loginField, FILTER_VALIDATE_EMAIL) 
            ? ['email' => $loginField, 'password' => $password] 
            : (is_numeric($loginField) ? ['celular' => $loginField, 'password' => $password] : ['username' => $loginField, 'password' => $password]);
    
        // Tentar autenticar o usuário
        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect()->route('index');
        } else {
            return redirect()->route('login')->with('error', 'Email, celular ou username ou senha incorretos');
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
    
    
    public function create(UserRequest $req)
    {
        $username = $req->username;
        $senha = $req->senha;
        $senhac = $req->senhaC;
        $cel = $req->cel;
        $name = $req->nome;
        $email = $req->email;  
        
        
    //  Erro de senhas diferentes
    if($senha !== $senhac){
        return redirect()->route('cadastrar')->with(['senhaC'=>'As senhas não coincidem']);
    }
    // Fim
    if (empty($cel)) {
        $cel = null;
    } else {
        // Remover espaços em branco extras e verificar o comprimento
        $cel = trim($cel); // Remove espaços em branco no início e no final
    
        if (strlen($cel) !== 8) {
            return redirect()->route('cadastrar')->withErrors(['celerro'=>'Numero de celular não possui 8 digitos']); // Se não tiver 8 dígitos, retorne um erro
        }
    }
    
    // Erro de username ja existe, nao pega
    $existingUser = User::where('username', $username)->first();
    if ($existingUser != null) {
        return redirect()->route('cadastrar')->with(['username' => 'Nome de usuário já registrado']);
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

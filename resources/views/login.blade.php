<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo adicional específico, se necessário */
        body {
            padding: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

 <!-- Sessão de erros -->
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
 <!-- sessão de erros -->
    <form method="POST" action="{{ route('processoLogin') }}" class="mt-4 p-4 border rounded bg-light">
        @csrf
        <div class="form-group">
            <input name="emailOrusernameOrphone" type="text" class="form-control"  required placeholder="Email, celular ou Nome de Usuario">
        </div>
        <div class="form-group"> 
            <input name="password" type="password" class="form-control" id="senha" required placeholder="Senha">
        </div>
        <div>
        <a href="{{route('cadastrar')}}">Cadastro</a>
        </div>

        

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

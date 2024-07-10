<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
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

    <!-- sessão de erros -->

    <!-- Erro de senhas diferentes-->
    @if(session('senhaC'))
    <div class="alert alert-danger">
        {{ session('senhaC') }}
    </div>
@endif
    <!-- Erro nome de usuario ja existe-->
@if(session('username'))
    <div class="alert alert-danger">
        {{ session('username') }}
    </div>
@endif

<!-- @if(session('celerro'))
    <div class="alert alert-danger">
        {{ session('celerro') }}
    </div>
@endif -->
    <!-- sessão de erros -->

    <form method="POST" action="{{ route('cre-post') }}" class="mt-4 p-4 border rounded bg-light">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input name="nome" type="text" class="form-control" id="nome" required>
        </div>
        <div class="form-group">
            <label for="username">Nome de usuario</label>
            <input name="username" type="text" class="form-control" id="username" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input name="email" type="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input name="senha" type="password" class="form-control" id="senha" required>
        </div>

        <div class="form-group">
            <label for="senhaC">Confirmar senha</label>
            <input name="senhaC" type="password" class="form-control" id="senhaC" required>
        </div>

        <div class="form-group">
            <label for="cel">Celular</label>
            <input name="cel" type="text" class="form-control" id="cel" >
                @error('celerro')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>


        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

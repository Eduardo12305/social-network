<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Adimin</title>
</head>
<body>
    <from method="POST" action="{{ route('') }}">
    @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input name="nome" type="text" class="form-control" id="nome" required>
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
        <div>
        <a href="{{route('login')}}">Login</a>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </from>
</body>
</html>
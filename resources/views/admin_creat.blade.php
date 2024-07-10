<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Admin</title>
</head>
<body>
    <form method="POST" action="{{ route('cre-admin') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input name="name" type="text" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="username">nome de usuario</label>
            <input name="username" type="text" class="form-control" id="username" required>
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
        <a href="{{route('admin_login')}}">Login</a>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>
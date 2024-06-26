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
    <form method="POST" action="{{ route('cre-post') }}" class="mt-4 p-4 border rounded bg-light">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input name="nome" type="text" class="form-control" id="nome" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input name="senha" type="password" class="form-control" id="senha" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input name="email" type="email" class="form-control" id="email" required>
        </div>
        <div>
        <a href="{{route('login')}}">Login</a>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

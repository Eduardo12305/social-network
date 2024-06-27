<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Usuarios</title>
</head>
<body>
<div>
        <p>Nome: {{ auth()->user()->nome }}</p>
        <p>Email: {{ auth()->user()->email }}</p>
        <p>Senha: {{ auth()->user()->password }}</p>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Usuarios</title>
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
</head>
<body>
<div class="container">
    <p><strong>Nome:</strong> {{ auth()->user()->name }}</p>
    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
    <p><strong>Senha:</strong> {{ auth()->user()->password }}</p>
</div>
</body>
</html>
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

<form method="POST" action="{{ route('user.update', [auth()->user()->id]) }}">
    @csrf
    @method('PUT')

    <p><strong>Nome:</strong> <input type="text" name="name" value="{{ auth()->user()->name }}"></p>
    <p><strong>Email:</strong> <input type="email" name="email" value="{{ auth()->user()->email }}"></p>
    <p><strong>Celular</strong><input type="text" name="cel" value="{{auth()->user()->celular}}"> </p>
    <p><strong>Senha atual:</strong> <input type="password" name="password"></p>
    <p><strong>Nova Senha:</strong> <input type="password" name="passwordNew"></p>
    

    <button type="submit">Atualizar Informações</button>
</form>

</div>
</body>
</html>
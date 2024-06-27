<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="{{route('logout')}}" method="get">
        <button  type="submit" style="color: white;">logout</button>
</form>
<a href="{{route('userdados',[auth()->user()->id])}}">
Ver dados
</a>


    <form method="POST" action="{{route('user.destroy', [auth()->user()->id])}}">
     @method('DELETE')
     @csrf
     <button type="submit">deletar</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esolha algum arquivo</title>
</head>
<body>
        <form method="POST" action="{{route('envImVd')}}">
            @csrf   
            <input type="file" name="arquivo" accept="image/*, video/*">
            <button type="submit">Postar</button>
        </form>
</body>
</html>
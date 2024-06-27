<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSS para posicionar o dropdown à direita */
        .dropdown-menu-right {
            position: absolute;
            right: 0;
            left: auto !important;
        }
    </style>
    <title>Home</title>
</head>
<body>
<div class="container mt-5">
        <h1 class="mb-4">Pagina inicial</h1>

        <!-- Incluir o dropdown -->
        @include('dropdown')
</div>
</body>
</html>
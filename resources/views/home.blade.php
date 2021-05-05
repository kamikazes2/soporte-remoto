<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <h1 style="text-align: center">   Pagina de Inicio   <h1>

    <ul>
    <li><a href='{{route('admin')}}'>Administradores</a></li>
    <li><a href='{{route('cliente')}}'>Clientes</a></li>
    <!--<li><a href='{{route('tecnico')}}'>Tecnicos</a></li>-->
    </ul>

        
</body>
</html>



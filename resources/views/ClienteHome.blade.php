<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zona Cliente</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="../css/app.css" rel="stylesheet">
    <link href="../css/custom_login.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="app-body">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a @click="menu=0" class="navbar-brand" href="#">Inicio</a>
                <div>
                  <ul class="navbar-nav mr-auto">
                    <li @click="menu=1">
                        <a class="nav-link" href="#">Solicitar un servicio</a>
                    </li>
                    <li @click="menu=2">
                        <a class="nav-link" href="#">Mis Solicitudes</a>
                    </li> 
                    <li>
                        <a class="nav-link" href="{{ url('cerrar-sesion') }}">Cerrar Sesion</a>
                    </li>  
                  </ul>
                </div>
            </nav>
            <!-- Menu principal-->
            <template v-if="menu==0">
                <b>Gestion de Sistemas - Soporte Remoto</b>
            </template>
            <template v-if="menu==1">
                <frmsolicitudservicio></frmsolicitudservicio> 
            </template>
            <template v-if="menu==2">
                <h1>mis solicitudes</h1>
            </template>
            <!--Fin menu principal-->
        </div>
    </div>

    <script src="../js/app.js"></script>
</body>
</html>
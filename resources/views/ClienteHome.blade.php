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
    <link href="../css/ClienteHome.css" rel="stylesheet">
    <link href="../css/catalogo.css" rel="stylesheet">
    <link href="../css/checkout.css" rel="stylesheet">
    <link href="../css/preloader.css" rel="stylesheet">
    <link href="../css/factura.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

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
                <nombreusuariologueado></nombreusuariologueado>
            </nav>
            <!-- Menu principal-->
            <template v-if="menu==0">
                <b>Gestion de Sistemas - Soporte Remoto</b>
            </template>
            <template v-if="menu==1">
                <frmsolicitudservicio></frmsolicitudservicio> 
            </template>
            <template v-if="menu==2">
                <frmmissolicitudes></frmmissolicitudes>
            </template>
            <!--Fin menu principal-->
        </div>
    </div>

    <script src="../js/app.js"></script>
</body>
</html>
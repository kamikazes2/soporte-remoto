<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>zona tecnico</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="../css/app.css" rel="stylesheet">
    <link href="../css/custom_login.css" rel="stylesheet">
    <link href="../css/custom_modal.css" rel="stylesheet">
    <link href="../css/adminHome.css" rel="stylesheet">
    <link href="{{asset("template/css/main.css")}}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="app-body">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a @click="menu=0" class="navbar-brand" href="#">Inicio</a>
                <div>
                  <ul class="navbar-nav mr-auto">
                    <li @click="menu=1">
                        <a class="nav-link" href="#">Servicio</a>
                    </li>
                    <li @click="menu=2">
                        <a class="nav-link" href="#">Especialidad</a>
                    </li>
                    <li @click="menu=3">
                        <a class="nav-link" href="#">Tenicos</a>
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
                <b>Servicios</b>
                <!-- Menu principal-->
                <frmservicio></frmservicio>
                <!--Fin menu principal-->
            </template>
            <template v-if="menu==2">
                <b>Especialidades</b>
                <!-- Menu principal-->
                <frmespecialidad></frmespecialidad>
                <!--Fin menu principal-->
            </template>
            <template v-if="menu==3">
                <b>Personal</b>
                <!-- Menu principal-->
                <frmpersonal></frmpersonal>
                <!--Fin menu principal-->
            </template>

            <!--Fin menu principal-->
            
        </div>
    </div>

    <script src="../js/app.js"></script>
    <script src="../template/js/bootstrap.min.js"></script>
    <script src="{{asset("template/js/main.js")}}"></script>
</body>
</html>
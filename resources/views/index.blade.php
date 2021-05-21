<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>desarrollo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="css/app.css" rel="stylesheet">
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
                        <a class="nav-link" href="#">Solicitud</a>
                    </li>
                   
                    
                  </ul>
                </div>
            </nav>
            <!-- Menu principal-->
            <template v-if="menu==0">
                <b>Gestion de Sistemas - Soporte Remoto</b>
                <!--<example-component></example-component> -->
                
            </template>
            <template v-if="menu==1">
                <frmservicio></frmservicio> 
            </template>
            <template v-if="menu==2">
                <frmsolicitudservicio></frmsolicitudservicio> 
            </template>

            <!--
            <template v-if="menu==3">
                <div id="tabledemo">
                <h3>Vue Datatable example</h3>
                Filter by anything: <input v-model="search">
                <hr>
                <data-table :servicios="filteredservicios"></data-table>
                </div>
               
            </template>
             -->
            <!--Fin menu principal-->
        </div>
    </div>

    <script src="js/app.js"></script>
</body>
</html>
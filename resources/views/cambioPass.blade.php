<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>desarrollo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/custom_login.css" rel="stylesheet">

    <link href="../css/catalogo.css" rel="stylesheet">
    <link href="../css/checkout.css" rel="stylesheet">
    <link href="../css/preloader.css" rel="stylesheet">
    <link href="../css/factura.css" rel="stylesheet">
    <link href="../css/frmMisSolicitudes.css" rel="stylesheet">
    <link href="{{asset("template/css/main.css")}}" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
</head>
<body>
    <div id="app">
        <div class="app-body">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            </nav>
            <!-- Menu principal-->
            <template>
                <b>Se requiere Cambio de usuario y contraseña</b>
                <cambiaruserpass></cambiaruserpass>
            </template>
            <!--Fin menu principal-->
        </div>
    </div>

    {{-- <script src="js/app.js"></script> --}}

    <script src="../js/app.js"></script>
    <script src="../template/js/bootstrap.min.js"></script>
    <script src="{{asset("template/js/main.js")}}"></script>
</body>
</html>
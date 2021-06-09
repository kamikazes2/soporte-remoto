<template>
    <div class="container"> 
                            <div style="display: none;"  id="preloader" class="preloaderContainer">
                                <div class="preloader"></div>
                                <div class="preloaderBackground"></div>
                            </div>
        <br>
        <div class="container" id="paso1">
            <div class="row justify-content-center">
                <div class="col-md-12" >
                    <div class="card">
                        <div class="card-header"> Datos del Cliente</div>
                            <div class="card-body">
                                 <div class="row">
                                    <div class="col-75">
                                        <div class="container">
                                        <form @submit.prevent="submitPaso1()">
                                            <div class="row">
                                            <div class="col-50">
                                                <h3>Datos del cliente</h3>
                                                <label for="dni">CI</label>
                                                <input required class="form-control" v-model="dniCliente"  type="text" id="dni" name="dni">
                                                <label for="fname">Nombre</label>
                                                <input required class="form-control" v-model="nombreCliente"  type="text" id="nombre" name="firstname" >
                                                <label for="apellido">Apellido</label>
                                                <input required class="form-control" v-model="apellidoCliente"  type="text" id="apellido" name="apellido" >
                                                <label for="fechaNacimiento">Fecha de nacimiento</label>
                                                <input required v-model="fechaNacimientoCliente"  class="form-control" type="date" id="fechaNacimiento" name="fechaNacimiento">
                                                <label for="correo">Correo</label>
                                                <input required v-model="correoCliente"  class="form-control" type="email" id="correo" name="correo">
                                                <label for="telefono">Telefono</label>
                                                <input required v-model="TelefonoCliente"  class="form-control" type="number" id="telefono" name="telefono">
                                            </div>

                                            <div class="col-50">
                                                <h3>Pago</h3>
                                                <label for="fname">Se aceptan</label>
                                                <div class="icon-container">
                                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                                                </div>
                                                <label for="cname">Nombre en la tarjeta</label>
                                                <input required class="form-control" v-model="nombreTarjeta"  type="text" id="cname" name="cardname">
                                                <label for="ccnum">Numero de la tarjeta</label>
                                                <input required class="form-control" v-model="numeroTarjeta"  type="number" id="ccnum" name="cardnumber">
                                                <label for="expmonth">Mes Exp</label>
                                                <input required class="form-control" v-model="expTarjeta"  type="number" id="expmonth" name="expmonth">

                                                <div class="row">
                                                <div class="col-50">
                                                    <label for="expyear">Año Exp</label>
                                                    <input required class="form-control" v-model="yearExpTarjeta"  type="number" id="expyear" name="expyear">
                                                </div>
                                                <div class="col-50">
                                                    <label for="cvv">CVV</label>
                                                    <input required class="form-control" v-model="cvvTarjeta"  type="number" id="cvv" name="cvv">
                                                </div>
                                                </div>
                                            </div>

                                            </div>
                                            <div id="btnVerificar">
                                                <button  class='btn btn-dark'>Siguiente</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div> 
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <br>


        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" id="paso2" style="display:none">
                    <div class="card-header"> Solicitud de Servicio</div>      
                        <div class="card-body" id="vistaServiciosDisponibles">
                            <div class='menuContent col-md-8'>
                                <div v-for="servicio in arrayServicio" :key="servicio.id" class='menuItem'>
                                    <!--<div class='menuImagen'>
                                        <img src='$dir'>
                                    </div>-->
                                    <div class='menuTitulo'>
                                                    {{servicio.nombre}}
                                    </div>
                                    <div class='menuDescripcion'>
                                        <p class='menuAreaDescripcion'>
                                              {{servicio.descripcion}}
                                        </p>
                                    </div>
                                    <div class='menuBtn'>
                                            <button @click="Agregar(servicio.nombre, servicio.id, servicio.precio, $event)" class='btn btn-dark'>Añadir</button>
                                    </div>
                                    <div class='menuPrecio text-danger'>
                                                        BS
                                    </div>
                                   <!-- <div class='menuOferta menuOferta-top-right'>
                                                <span> -10% </span>
                                    </div> -->
                                    <div class='menuPrecio'>
                                                {{servicio.precio}}BS
                                    </div>
                                </div>
                            </div>

                                    <div class="col-4 carrito1">
                                        <div class="container">
                                        <h4>Carrito
                                            <span class="price" style="color:black">
                                            <i class="fa fa-shopping-cart"></i>
                                            <b>{{cantCarrito}}</b>
                                            </span>
                                        </h4>
                                        <div v-for="carrito in carritoservicios" :key="carrito.idServicio">
                                            <div class="carritoNombre">
                                                <a href="#">{{carrito.nombre}}</a> 
                                            </div>
                                            <div class="carritoPrecio2">
                                            <span class="price">{{carrito.precioFijado}}</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <p>Total <span class="price" style="color:black"><b>{{total}}</b></span></p>
                                            <div class="CenteredDivContent"><button @click="siguiente()" disabled id="btnSiguiente" class="btn btn-success">siguiente</button></div>
                                        </div>
                                    </div>

                        </div>
                        
                </div>
            </div>
        </div>


        <div class="container" id="paso3" style="display:none">
            <div><button style="width: 20%" @click="irPaso2()"  class="btn btn-danger">Cancelar</button></div>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12" >
                    <div class="card">
                        <div class="card-header"> Ultimo paso</div>
                            <div class="card-body">
                                 <div class="row">
                                    <div class="col-75">
                                        <div class="container">
                                            <div class="col-50">
                                                <h3>Datos de facturacion</h3>
                                                <label for="nit">Nit</label>
                                                <input required class="form-control" v-model="nitCliente" type="text">
                                                <label for="fname">Nombre completo</label>
                                                <input required class="form-control" v-model="nitNombreCliente"  type="text">
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-12 carrito1">
                                                <div class="container">
                                                <h4>Detalles de la compra
                                                    <span class="price" style="color:black">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    <b>{{cantCarrito}}</b>
                                                    </span>
                                                </h4>
                                                <div v-for="carrito in carritoservicios" :key="carrito.idServicio">
                                                    <div class="carritoNombre">
                                                        <a href="#">{{carrito.nombre}}</a> 
                                                    </div>
                                                    <div class="carritoPrecio2">
                                                    <span class="price">{{carrito.precioFijado}}Bs</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <p>Total <span class="price" style="color:black"><b>{{total}}Bs</b></span></p>
                                                <p>A pagar <span class="price" style="color:red"><b>{{total*0.10}}Bs</b></span></p>
                                                    <div class="CenteredDivContent">
                                                        <strong>Al solicitar el servicio se le hará un recargo del 10% del total</strong><br>
                                                        <button style="width: 20%" @click="pagar()"  id="btnPagar" class="btn btn-success">Pagar</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                 </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
</template>

<script>
    import { jsPDF } from "jspdf";

    export default {
        data(){
            return{
                nombre :'',
                descripcion : '',
                precio : 0,
                arrayServicio : [],
                listaservicios: [],
                carritoservicios: [

                 ],
                servicio: {
                    'idServicio': 0,
                    'precioFijado': 0,
                },
                total: 0,
                cantCarrito:0,
                correoCliente:'',

                //para el cliente
                idCliente: '',

                nombreCliente:'',
                apellidoCliente:'',
                dniCliente:'',
                fechaNacimientoCliente:'',
                TelefonoCliente: '',

                nombreTarjeta:'',
                numeroTarjeta:'',
                expTarjeta :'',
                yearExpTarjeta : '',
                cvvTarjeta : '',

                nitNombreCliente: '',
                nitCliente: '',
                idNit: 0,
                idFact: 0,
                arrayServiciosRealizar: [],
                

                //para crear la vista de la factura
                facturaFecha: '',
                facturaNombre: '',
                facturaNit: '',
                arrayDetalleFactura: '',
                totalDetalle: 0

            }
        },
        methods:{
            async getDataUsuario(){
                var re;
                await axios.get('/request/get-data-usuario').then(function (res) {
                    re = res.data;
                }).catch(error => {});
                this.correoCliente = re.email;
            },
            async findLastCliente(){
                var i = false;
                await axios.get('/request/get-ultimo-cliente-del-usuario').then(function(response){
                    var res = response.data;
                    if(res.error == false){
                        res = res.cliente;
                        this.idCliente = res.id
                        this.dniCliente = res.dni;
                        this.nombreCliente = res.nombre;
                        this.apellidoCliente = res.apellido;
                        this.TelefonoCliente = res.telefono;
                    }
                }.bind(this));
                return i;
            },
            async verificarSiExisteCliente(){
                var re;
                await axios.get('/request/verificar-cliente/'+this.dniCliente).then(function (res) {
                    re =  res;
                }).catch(error => {
                })
                return re.data;
            },
            async verificarSiExisteUsuario(){
                var re;
                await axios.get('/request/verificar-usuario/'+this.correoCliente).then(function (res) {
                    re =  res;
                }).catch(error => {
                })
                return re.data;
            },
            async crearNuevoCliente(){
                var r;
                await axios.post('/request/nuevo-cliente2',{
                    'dni': this.dniCliente,
                    'nombre': this.nombreCliente,
                    'apellido': this.apellidoCliente,
                    'fechaNacimiento': this.fechaNacimientoCliente,
                    'telefono': this.TelefonoCliente
                }).then(function(res){
                    r = res.data;
                }).catch(function(error){
                    console.log(error);
                });
                return r;
            },
            async createNuevoUsuario(nombre, usuario, email, password){
                var r;
                await axios.post('/request/nuevo-usuario',{
                    'nombre': nombre,
                    'usuario': usuario,
                    'email': email,
                    'password': password,
                    'tipoUsuario': 'cliente'
                }).then((response) => {
                    r = response.data.user;
                }).catch(function(error){
                    console.log(error);
                });
                return r;
            },
            async createClienteUsuario(idUsuario, idCliente){
                var r;
                await axios.post('/request/nuevo-cliente-usuario',{
                    'idUsuario': idUsuario,
                    'idCliente': idCliente
                }).then((response) => {
                    r = response.data;
                }).catch(function(error){
                    console.log(error);
                });
                return r;
            },
            async modificarCliente(id,dni, nombre, apellido, fechaNacimiento, telefono){
                var r;
                await axios.post('/request/actualizar-cliente2',{
                    'idCliente' : id,
                    'dni': dni,
                    'nombre': nombre,
                    'apellido': apellido,
                    'fechaNacimiento': fechaNacimiento,
                    'telefono': telefono
                }).then(function(res){
                    r = res.data;
                }).catch(function(error){
                    console.log(error);
                });
                return r;
            },
            async verificarSiClienteTieneTarjeta(idCliente){
                var r;
                if(idCliente != 0 && idCliente!= null){
                    await axios.get('/request/buscar-tarjeta-cliente/'+idCliente).then(function (res) {
                    if(res.data.tiene){
                        r =  res.data;
                    }else{
                        r = null;
                    }
                });
                }
                return r;
            },
            async createTarjeta(idCliente){
                var data;
                await axios.post('/request/nueva-tarjeta',{
                    'idCliente' : idCliente,
                    'nombre': this.nombreTarjeta,
                    'numero': this.numeroTarjeta,
                    'mes': this.expTarjeta,
                    'anio': this.yearExpTarjeta
                }).then(function(res){
                    data = res.data;
                }).catch(function(error){
                    console.log(error);
                });
                return data;
            },
            async submitPaso1(){
                var preloader = document.getElementById("preloader");
                preloader.style.display="block";
                //verificar si existe el cliente con el dni
                var cliente = await this.verificarSiExisteCliente();

                var cli;
                if(cliente.existe == false){   //si no existe el cliente crearlo
                    cli = await this.crearNuevoCliente();
                }else{
                    cli = cliente.cliente[0];
                    if(
                        this.nombreCliente != cli.nombre ||
                        this.apellidoCliente != cli.apellidoCliente ||
                        this.telefono != cli.telefono
                    ){
                        //modificar cliente ya que no son iguales
                        var nuevo = await this.modificarCliente(cli.id, this.dniCliente , this.nombreCliente, this.apellidoCliente, this.fechaNacimientoCliente, this.TelefonoCliente)
                        cli = nuevo;
                    }
                }

                this.idCliente = cli.id;

                //verificamos si existe el usuario con el correo
                var usuario = await this.verificarSiExisteUsuario();

                var usu;
                if(usuario.existe == false){   //si no existe el usuario crearlo
                    var username = this.nombreCliente[0]+this.apellidoCliente+String(cli.id);
                    var password = this.apellidoCliente+String(cli.id);
                    usu = await this.createNuevoUsuario(this.nombreCliente, username, this.correoCliente, password);
                }else{
                    usu = usuario.usuario[0];
                }
                //asignar ese cliente creado a un usuario, 
                //si es el mismo usuario solo 1 si el diferente 2, 
                //al mismo usuario y a un nuevo usuario
                await this.createClienteUsuario(usu.id, cli.id);

                var tarjeta = await this.verificarSiClienteTieneTarjeta(cli.id);

                if(tarjeta == null){
                    var newTar = await this.createTarjeta(cli.id);
                }else{
                    tarjeta = tarjeta.tarjeta[0];
                    if(
                        tarjeta.nombre != this.nombreTarjeta ||
                        tarjeta.numero != this.numeroTarjeta ||
                        tarjeta.mes     != this.expTarjeta   ||
                        tarjeta.anio    != this.yearExpTarjeta
                    ){
                        //crear otra tarjeta
                        var newTar = await this.createTarjeta(cli.id);
                    }
                }

                await setTimeout(async function() {
                    preloader.style.display="none";
                    document.getElementById("paso1").style.display = "none";
                    document.getElementById("paso2").style.display = "flex";
                }, 3000);
                
            },
            Agregar(nombre, idServicio, precio, event){
                var btn = event.target;
                    // btn.disabled = true;
                if(this.carritoservicios.findIndex(servicio => 
                    servicio.idServicio === idServicio
                    ) != -1)
                {
                    btn.innerHTML = "Añadir";
                    btn.className = "btn btn-dark";
                    var index = this.carritoservicios.findIndex(function(array) {
                        return array.idServicio == idServicio
                    });
                    this.carritoservicios.splice(index, 1);
                    this.total = parseFloat(this.total) - parseFloat(precio);
                    this.cantCarrito-=1;
                }else{
                    btn.innerHTML = "Quitar";
                    btn.className = "btn btn-danger";
                    var servicio = {
                    'idServicio': 0,
                    'precioFijado': 0,
                    'nombre': ''
                    };
                    this.total = parseFloat(this.total) + parseFloat(precio);

                    servicio.idServicio = idServicio;
                    servicio.precioFijado = precio;
                    servicio.nombre = nombre;
                    this.carritoservicios.push(servicio);
                    this.cantCarrito+=1;
                }
                if(this.cantCarrito==0){
                    document.getElementById("btnSiguiente").disabled = true;
                }else{
                    document.getElementById("btnSiguiente").disabled = false;
                }
            },
            async solicitar(){
                var a;
                let me = this;
                await axios.post('/request/create-solicitud-servicio2',{
                        /* 
                            Cambiar a mandar un arraydeServicios donde cada servicio manda un idSErvicio y preciofijado
                        */
                        'arrayServicios' : this.carritoservicios,
                        'idCliente': this.idCliente
                        
                }).then(function(res){
                        //alert("La solicitud fue registrada correctamente");
                        a = res.data;
                }).catch(function(error){
                        console.log(error);
                });
                return a;
            },
            async createDetalleFactura(idF, idS, nroPago, monto){
                var data;
                await axios.post('/request/nuevo-detalle-factura',{
                    'idFactura' : idF,
                    'idSolicitudServicio': idS,
                    'nroPago': nroPago,
                    'monto': monto,
                    'detalle': 'pago incial del 10%' 
                }).then(function(res){
                    data = res.data;
                }).catch(function(error){
                    console.log(error);
                });
                return data;
            },
            async createFactura(idNit){
                var data;
                await axios.post('/request/nueva-factura',{
                    'idNit' : idNit
                }).then(function(res){
                    data = res.data;
                }).catch(function(error){
                    console.log(error);
                });
                return data;
            },
            async verificarSiClienteTieneNit(idCliente){
                var r;
                if(idCliente != 0 && idCliente!= null){
                    await axios.get('/request/buscar-nit-cliente/'+idCliente).then(function (res) {
                    if(res.data.tiene){
                        r =  res.data;
                    }else{
                        r = null;
                    }
                });
                }
                return r;
            },
            async createNit(){
                var data;
                if(this.nitNombreCliente==''){
                    this.nitNombreCliente = "s/n";
                }
                if(this.nitCliente == ''){
                    this.nitCliente = 0;
                }
                await axios.post('/request/nuevo-nit',{
                    'idCliente' : this.idCliente,
                    'nombre': this.nitNombreCliente,
                    'nit': this.nitCliente,
                    'tipo': 'nit'
                }).then(function(res){
                    data = res.data;
                }).catch(function(error){
                    console.log(error);
                });
                return data;
            },
            async pagar(){
                if(this.nitCliente == "" || this.nitNombreCliente == ""){
                    var r = confirm("Los datos de facturacion no han sido llenados, desea continuar?");
                    if(r==false)
                        return;
                }
                var preloader = document.getElementById("preloader");
                preloader.style.display="block";
                var nit =  await this.verificarSiClienteTieneNit(this.idCliente);
                if(nit!=null){
                    //verificar si es igual
                    nit = nit.nitTributario[0];
                    console.log(nit);
                    if(
                        nit.nombre != this.nitNombreCliente ||
                        nit.nit != this.nitCliente
                    ){
                        var sol = await this.solicitar();
                        var nit = await this.createNit();
                        var factura = await this.createFactura(nit.id);
                        var df = await this.createDetalleFactura(factura.id, sol[0].id, "1", this.total*0.10)
                    }else{
                        var sol = await this.solicitar();
                        var factura = await this.createFactura(nit.id);
                        var df = await this.createDetalleFactura(factura.id, sol[0].id, "1", this.total*0.10)
                    }

                }else{ //crear
                    var sol = await this.solicitar();
                    var nit = await this.createNit();
                    var factura = await this.createFactura(nit.id);
                    var df = await this.createDetalleFactura(factura.id, sol[0].id, "1", this.total*0.10)
                }
                await setTimeout(async function() {
                    preloader.style.display="none";
                    alert("solicitado correctamente")
                    window.location = '/';
                }, 3000);
                
                
                


            },
            async siguiente(){
                document.getElementById("paso2").style.display = "none";
                document.getElementById("paso3").style.display = "block";
            }
        },
            async mounted() {
                await axios.get('/request/get-servicios2').then(function(response){
                        this.arrayServicio = response.data;
                }.bind(this));
                await this.getDataUsuario();
                await this.findLastCliente();
                var tar = await this.verificarSiClienteTieneTarjeta(this.idCliente);
                if(tar!=null){
                    tar = tar.tarjeta[0];
                    this.nombreTarjeta = tar.nombre;
                    this.numeroTarjeta = tar.numero;
                    this.expTarjeta = tar.mes;
                    this.yearExpTarjeta = tar.anio;
                }

            },
    }
</script>

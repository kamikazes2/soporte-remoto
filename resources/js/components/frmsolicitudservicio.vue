<template>
    <div class="container"> 
                            <div style="display: none;"  id="preloader" class="preloaderContainer">
                                <div class="preloader"></div>
                                <div class="preloaderBackground"></div>
                            </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" id="paso1">
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
                                            <div class="CenteredDivContent"><button @click="irPaso2()" disabled id="btnSiguiente" class="btn btn-success">Siguiente</button></div>
                                        </div>
                                    </div>

                        </div>
                        
                </div>
            </div>
        </div>
        <br>
        <div class="container" id="paso2" style="display:none">
            <div class="row justify-content-center">
                <div class="col-md-12" >
                    <div class="card">
                        <div class="card-header"> Finalizar Compra</div>
                            <div class="card-body">
                                 <div class="row">
                                    <div class="col-75">
                                        <div class="container">
                                        <form @submit.prevent="verificar()">

                                            <div class="row">
                                            <div class="col-50">
                                                <h3>Datos del cliente</h3>
                                                <label for="dni">DNI</label>
                                                <input class="form-control" v-model="dniCliente" required type="text" id="dni" name="dni">
                                                <label for="fname">Nombre</label>
                                                <input class="form-control" v-model="nombreCliente" required type="text" id="nombre" name="firstname" >
                                                <label for="apellido">Apellido</label>
                                                <input class="form-control" v-model="apellidoCliente" required type="text" id="apellido" name="apellido" >
                                                <label for="fechaNacimiento">Fecha de nacimiento</label>
                                                <input v-model="fechaNacimientoCliente" required class="form-control" type="date" id="fechaNacimiento" name="fechaNacimiento">
                                                <label for="telefono">Telefono</label>
                                                <input class="form-control" v-model="telefonoCliente" required type="number" id="telefono" name="telefono" >
                                                
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
                                                <input class="form-control" v-model="nombreTarjeta" required type="text" id="cname" name="cardname">
                                                <label for="ccnum">Numero de la tarjeta</label>
                                                <input class="form-control" v-model="numeroTarjeta" required type="number" id="ccnum" name="cardnumber">
                                                <label for="expmonth">Mes Exp</label>
                                                <input class="form-control" v-model="expTarjeta" required type="number" id="expmonth" name="expmonth">

                                                <div class="row">
                                                <div class="col-50">
                                                    <label for="expyear">Año Exp</label>
                                                    <input class="form-control" v-model="yearExpTarjeta" required type="number" id="expyear" name="expyear">
                                                </div>
                                                <div class="col-50">
                                                    <label for="cvv">CVV</label>
                                                    <input class="form-control" v-model="cvvTarjeta" required type="number" id="cvv" name="cvv">
                                                </div>
                                                </div>
                                            </div>

                                            </div>
                                            <div id="btnVerificar">
                                                <button  class='btn btn-dark'>Verificar</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>

                                    <div class="col-25">
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
                                            <div class="carritoPrecio">
                                            <span class="price">{{carrito.precioFijado}}</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <p>Total <span class="price" style="color:black"><b>{{total}}</b></span></p>
                                        </div>
                                        <div class="CenteredDivContent">
                                            <button @click="irPaso1" class="btn btn-danger">Volver</button>
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

                //para el cliente
                nombreCliente:'',
                apellidoCliente:'',
                dniCliente:'',
                fechaNacimientoCliente:'',
                nombreTarjeta:'',
                numeroTarjeta:'',
                expTarjeta :'',
                yearExpTarjeta : '',
                cvvTarjeta : '',    
                telefonoCliente: ''
            }
        },
        methods:{
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
            irPaso2(){
                document.getElementById("paso1").style.display = "none";
                document.getElementById("paso2").style.display = "block";
            },
            irPaso1(){
                document.getElementById("paso2").style.display = "none";
                document.getElementById("paso1").style.display = "flex";
            },
            verificar(){
                let me = this;
                var preloader = document.getElementById("preloader");
                preloader.style.display="block";
                //verificar si existe el cliente
                    
                //si no existe registrarlo
                axios.post('/request/nuevo-cliente2',{
                    'dni' : this.dniCliente,
                    'nombre': this.nombreCliente,
                    'apellido': this.apellidoCliente,
                    'fechaNacimiento': this.fechaNacimientoCliente 
                }).then(function(error){
                    setTimeout(function() {
                        preloader.style.display="none";
                    }, 2000);
                    alert("La solicitud fue registrada correctamente");
                }).catch(function(error){
                        console.log(error);
                        preloader.style.display="none";
                });

            },
            Solicitar(){
                    let me = this;
                    axios.post('request/nuevo-solicitud-servicio',{
                        /* 
                            Cambiar a mandar un arraydeServicios donde cada servicio manda un idSErvicio y preciofijado
                        */
                        'arrayServicios' : this.carritoservicios,
                        
                    }).then(function(error){
                        alert("La solicitud fue registrada correctamente");
                        me.listaservicios=[];
                    }).catch(function(error){
                        console.log(error);
                    });
                },
            },
            mounted() {
                axios.get('/request/get-servicios2').then(function(response){
                        this.arrayServicio = response.data;
                    }.bind(this));
                },
    }
</script>
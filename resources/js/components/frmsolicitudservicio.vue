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
                                                <input class="form-control" v-model="dniCliente"  type="text" id="dni" name="dni">
                                                <label for="fname">Nombre</label>
                                                <input class="form-control" v-model="nombreCliente"  type="text" id="nombre" name="firstname" >
                                                <label for="apellido">Apellido</label>
                                                <input class="form-control" v-model="apellidoCliente"  type="text" id="apellido" name="apellido" >
                                                <label for="fechaNacimiento">Fecha de nacimiento</label>
                                                <input v-model="fechaNacimientoCliente"  class="form-control" type="date" id="fechaNacimiento" name="fechaNacimiento">
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
                                                <input class="form-control" v-model="nombreTarjeta"  type="text" id="cname" name="cardname">
                                                <label for="ccnum">Numero de la tarjeta</label>
                                                <input class="form-control" v-model="numeroTarjeta"  type="number" id="ccnum" name="cardnumber">
                                                <label for="expmonth">Mes Exp</label>
                                                <input class="form-control" v-model="expTarjeta"  type="number" id="expmonth" name="expmonth">

                                                <div class="row">
                                                <div class="col-50">
                                                    <label for="expyear">Año Exp</label>
                                                    <input class="form-control" v-model="yearExpTarjeta"  type="number" id="expyear" name="expyear">
                                                </div>
                                                <div class="col-50">
                                                    <label for="cvv">CVV</label>
                                                    <input class="form-control" v-model="cvvTarjeta"  type="number" id="cvv" name="cvv">
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
                idCliente: '',
                nombreCliente:'',
                apellidoCliente:'',
                dniCliente:'',
                fechaNacimientoCliente:'',
                nombreTarjeta:'',
                numeroTarjeta:'',
                expTarjeta :'',
                yearExpTarjeta : '',
                cvvTarjeta : ''
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

            async verificar(){
                var preloader = document.getElementById("preloader");
                preloader.style.display="block";
                var cliente = await this.verificarSiExisteCliente();
                if(cliente.existe){
                    this.idCliente = cliente.cliente[0].id;
                    var datosIguales = this.verificarDatosIgualesConBD(cliente.cliente[0]);
                    if(!datosIguales){
                        //pasar a actualizar
                        await this.updateCliente(cliente.cliente[0].id, this.nombreCliente, this.apellidoCliente, this.fechaNacimientoCliente);
                    }
                }else{
                    //crear el nuevo cliente
                    this.idCliente = await this.createCliente();
                }
                //verificar tarjeta
                var tieneTarjeta = await this.verificarSiClienteTieneTarjeta(this.idCliente);
                if(tieneTarjeta!=null){
                    //verificar que los datos sean iguales
                    var iguales = this.verificarTarjetaIgualConBD(tieneTarjeta.tarjeta[0]);
                    ////crear la nueva tarjeta si es diferente
                    if(!iguales){
                        await this.createTarjeta();
                    }
                }else{
                    //crear la nueva tarjeta
                    await this.createTarjeta();
                }
                //enviar al ultimo paso de compra
                setTimeout(function() {
                    preloader.style.display="none";
                    console.log("enviar al ultimo paso");
                }, 3000);

            },
            async verificarSiExisteCliente(){
                var re;
                await axios.get('/request/verificar-cliente/'+this.dniCliente).then(function (res) {
                    re =  res;
                }).catch(error => {
                })
                return re.data;
            },
            verificarDatosIgualesConBD(db){
                if(db.nombre != this.nombreCliente||db.apellido != this.apellidoCliente){return false;}else{return true;}
            },
            verificarTarjetaIgualConBD(db){
                if(db.nombre != this.nombreTarjeta || db.numero != this.numeroTarjeta || db.mes != this.expTarjeta || db.anio != this.yearExpTarjeta){return false;}else{return true;}
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
            async updateCliente(id, nombre, apellido, fechaNacimiento){
                var r;
                await axios.post('/request/actualizar-cliente2',{
                    'idCliente' : id,
                    'nombre': nombre,
                    'apellido': apellido,
                    'fechaNacimiento': fechaNacimiento 
                }).then(function(res){
                    r = res;
                }).catch(function(error){
                        console.log(error);
                });
                return r;
            },
            async createCliente(){
                var id;
                await axios.post('/request/nuevo-cliente2',{
                    'dni' : this.dniCliente,
                    'nombre': this.nombreCliente,
                    'apellido': this.apellidoCliente,
                    'fechaNacimiento': this.fechaNacimientoCliente 
                }).then(function(res){
                    id = res.data.id;
                }).catch(function(error){
                    console.log(error);
                    preloader.style.display="none";
                });
                return id;
            },
            async createTarjeta(){
                var data;
                await axios.post('/request/nueva-tarjeta',{
                    'idCliente' : this.idCliente,
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
            async findCliente(){
                var i = false;
                await axios.get('/request/buscar-ultimo-cliente-usuario-logueado').then(function(response){
                        if(response.data!=false){
                            var data = response.data;
                            var MyDate = new Date(data.fechaNacimiento.replace(/-/g,"/"));
                            var MyDateString;
                            MyDate.setDate(MyDate.getDate() + 20);
                            MyDateString = MyDate.getFullYear() + '-' +('0' + MyDate.getDate()).slice(-2) + '-'
                                        + ('0' + (MyDate.getMonth()+1)).slice(-2);
                            this.nombreCliente = data.nombre;
                            this.apellidoCliente = data.apellido;
                            this.dniCliente = data.dni;
                            this.fechaNacimientoCliente = MyDateString;
                            this.idCliente = data.id;
                        }else{
                            i = false;
                        }
                }.bind(this));
                return i;
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
            async mounted() {
                await axios.get('/request/get-servicios2').then(function(response){
                        this.arrayServicio = response.data;
                }.bind(this));
                
                await this.findCliente();
                var tarjeta = await this.verificarSiClienteTieneTarjeta(this.idCliente);
                console.log(this.idCliente);
                console.log(tarjeta);
                if(tarjeta != null && tarjeta.tiene){
                    tarjeta = tarjeta.tarjeta[0];
                    this.nombreTarjeta = tarjeta.nombre;
                    this.numeroTarjeta = tarjeta.numero;
                    this.expTarjeta = tarjeta.mes;
                    this.yearExpTarjeta = tarjeta.anio;
                }
            },
    }
</script>

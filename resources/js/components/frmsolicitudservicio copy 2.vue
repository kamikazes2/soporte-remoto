<template>
    <div class="container"> 
                            <div style="display: none;"  id="preloader" class="preloaderContainer">
                                <div class="preloader"></div>
                                <div class="preloaderBackground"></div>
                            </div>
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
                                            <div class="CenteredDivContent"><button @click="irPaso2()" disabled id="btnSiguiente" class="btn btn-success">Siguiente</button></div>
                                        </div>
                                    </div>

                        </div>
                        
                </div>
            </div>
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
                                        <form @submit.prevent="irPaso2()">
                                             <!-- verificar() --> en vez de paso 2

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

                                    <!-- <div class="col-25">
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
                                    </div> -->
                                    </div> 
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

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
                                                <input required class="form-control" v-model="nitCliente"  type="text">
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
                                                    <span class="price">{{carrito.precioFijado}}</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <p>Total <span class="price" style="color:black"><b>{{total}}</b></span></p>
                                                    <div class="CenteredDivContent">
                                                        <button style="width: 20%" @click="pagar()"  id="btnPagar" class="btn btn-success">Pagar Total</button>
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
        <div id="paso4" style="display: none">
            <div class="alignRight">
                <button @click="downloadPDFWithjsPDF()" class="btn btn-success btn-descargar-factura">Descargar</button>
                <button @click="salir()" class="btn btn-danger btn-descargar-factura">Salir</button>
            </div>
            <br>
            <br>
            <div id="facturaHTML" class="contenedor-factura">
                <div class="contenedor-interior">
                    <div class="factura-header">
                        <table class="table-header-factura">
                            <tr>
                                <td>Soporte Remoto SRL.</td>
                            </tr>
                            <tr>
                                <td>Av. Paragua 4to anillo</td>
                            </tr>
                            <tr>
                                <td>Santa Cruz - Bolivia</td>
                            </tr>
                        </table>
                        <h1 class="factura-title">FACTURA</h1>
                    </div>
                    <div class="factura-body">
                        <div class="informacion-factura">
                            <table class="table-body-factura">
                                <tr>
                                    <td><strong>Fecha:</strong> {{facturaFecha}}</td>
                                    <td class="alignRight"><strong>Nit:</strong> {{facturaNit}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Señor(es):</strong> {{facturaNombre}}</td>
                                    <td></td>
                                </tr>
                            </table>          
                        </div>
                        <div class="detalle-factura">
                            <table class="table-detalle-factura">
                                <thead>
                                    <tr>
                                    <th>Cant</th>
                                    <th>Descripcion</th>
                                    <th>P/U</th>
                                    <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="detalle in arrayDetalleFactura" :key="detalle.id" >
                                        <td>1</td>
                                        <td>{{detalle.nombreServicio}}</td>
                                        <td>{{detalle.precio}}</td>
                                        <td>{{detalle.precio}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="total-factura"><strong>TOTAL</strong></td>
                                        <td class="negrilla">{{totalDetalle}} Bs.</td>
                                    </tr>
                                </tbody>
                            </table>
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
                TelefonoCliente: '',

                //para crear la vista de la factura
                facturaFecha: '',
                facturaNombre: '',
                facturaNit: '',
                arrayDetalleFactura: '',
                totalDetalle: 0

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
                document.getElementById("paso3").style.display = "none";
            },
            irPaso1(){
                document.getElementById("paso2").style.display = "none";
                document.getElementById("paso1").style.display = "flex";
                document.getElementById("paso3").style.display = "none";
            },
            irPaso3(){
                document.getElementById("paso1").style.display = "none";
                document.getElementById("paso2").style.display = "none";
                document.getElementById("paso3").style.display = "block";
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
                    document.getElementById("paso1").style.display = "none";
                    document.getElementById("paso2").style.display = "none";
                    document.getElementById("paso3").style.display = "block";
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
            async updateCliente(id, nombre, apellido, fechaNacimiento){
                var r;
                console.log(id + nombre + apellido + fechaNacimiento);
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
            salir(){
                window.location = '/';
            },
            async pagar(){
                preloader.style.display="block";
                var nit = await this.verificarSiClienteTieneNit(this.idCliente);
                if(nit != null && nit.tiene){
                    nit = nit.nitTributario[0];
                    var iguales = this.verificarDatosIgualesConBD(nit);
                    if(!iguales){
                        var nuevoNit = await this.createNit();
                        this.idNit = nuevoNit.id;
                    }else{
                        this.idNit = nit.id;
                    }
                }else{
                    var nuevoNit = await this.createNit();
                    this.idNit = nuevoNit.id;
                }
                //realizamos la solicitud y generamos la factura
                var servRealizar = await this.solicitar();
                //crear una factura con el nit
                var fact = await this.createFactura();
                this.idFact = fact.id; //obtengo el id de la factura creada
                //por cada servicioRealizar crear un detalle de factura asignado a 1 factura
                servRealizar.forEach(sr => {
                    var k = {'id':sr.id}
                    this.arrayServiciosRealizar.push(k);
                });
                var r = await this.createDetalleFactura();
                await this.generarFactura();
                setTimeout(async function() {        
                    preloader.style.display="none";
                    console.log("finalizar y mostrar la factura");
                    document.getElementById("paso3").style.display = "none";
                    document.getElementById("paso4").style.display = "block";
                }, 3000);
            },
            async createFactura(){
                var data;
                await axios.post('/request/nueva-factura',{
                    'idNit' : this.idNit
                }).then(function(res){
                    data = res.data;
                }).catch(function(error){
                    console.log(error);
                });
                return data;
            },
            async createDetalleFactura(){
                var data;
                await axios.post('/request/nuevo-detalle-factura',{
                    'idFactura' : this.idFact,
                    'arrayIdServiciosRealizar': this.arrayServiciosRealizar
                }).then(function(res){
                    data = res.data;
                }).catch(function(error){
                    console.log(error);
                });
                return data;
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
            verificarDatosIgualesConBD(db){
                if(db.nit != this.nitCliente || db.nombre != this.nitNombreCliente){return false;}else{return true;}
            },
            async generarFactura(){
                var re;
                await axios.get('/request/get-factura-completa/'+this.idFact).then(function (res) {
                    re = res.data;
                }).catch(error => {});
                this.facturaFecha = re.fecha;
                this.facturaNombre = re.nombreCliente;
                this.facturaNit = re.nit;
                this.arrayDetalleFactura = re.detalleFactura;
                re.detalleFactura.forEach(df => {
                    this.totalDetalle = parseFloat(this.totalDetalle) + parseFloat(df.precio);
                });
            },
            async getDataUsuario(){
                var re;
                // await axios.get('/request/get-data-usuario').then(function (res) {
                //     re = res.data;
                // }).catch(error => {});
                // console.log(re)
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
            downloadPDFWithjsPDF() {
                var doc = new jsPDF('l', 'mm', [800, 450]);
                doc.html(document.querySelector('#facturaHTML'), {
                    callback: function (doc) {
                    doc.save('factura.pdf');
                    },
                    margin: [10, 10, 10, 10],
                    x: 32,
                    y: 32,
                });

            },
        },
            async mounted() {
                await axios.get('/request/get-servicios2').then(function(response){
                        this.arrayServicio = response.data;
                }.bind(this));

                await this.getDataUsuario();
                
                await this.findCliente();
                var tarjeta = await this.verificarSiClienteTieneTarjeta(this.idCliente);
                if(tarjeta != null && tarjeta.tiene){
                    tarjeta = tarjeta.tarjeta[0];
                    this.nombreTarjeta = tarjeta.nombre;
                    this.numeroTarjeta = tarjeta.numero;
                    this.expTarjeta = tarjeta.mes;
                    this.yearExpTarjeta = tarjeta.anio;
                }
                var nit = await this.verificarSiClienteTieneNit(this.idCliente);
                if(nit != null && nit.tiene){
                    nit = nit.nitTributario[0];
                    this.nitNombreCliente = nit.nombre;
                    this.nitCliente = nit.nit;
                }
            },
    }
</script>

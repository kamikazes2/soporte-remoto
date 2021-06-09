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
            async submitPaso1(){
                //verificar si existe el cliente con el dni
                var cliente = await this.verificarSiExisteCliente();
                console.log(cliente);
                //si existe modificar al cliente, verificar si tiene tarjeta, si no tiene crear si tiene modificar
                //si no existe crear al cliente
                //si no existe crear tarjeta
            }

        },
            async mounted() {
                await this.getDataUsuario();
                await this.findLastCliente();
            },
    }
</script>

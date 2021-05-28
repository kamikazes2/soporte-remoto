<template>
    <div class="container">
		<div class="row justify-content-center">			
			<div class="mx-auto">
				<div class="col-lg-12">
					<div class="text-center my-3">
						<h6 class="text-center my-5"><b>Solicitud de Servicio</b></h6>
                        <!-- Cliente -->
                        <script type="text/x-template" id="modal-template">
                            <transition name="modal">
                                <div class="modal-mask">
                                <div class="modal-wrapper">
                                    <div class="modal-container">
                                    <div class="modal-header">
                                        <slot name="header">
                                        default header
                                        </slot>
                                    </div>
                                    <div class="modal-body">
                                        <slot name="body">
                                        default body
                                        </slot>
                                    </div>
                                    <div class="modal-footer">
                                        <slot name="footer">
                                        <button class="btn btn-danger" @click="$emit('close')">
                                            Cerrar
                                        </button>
                                        </slot>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </transition>
                        </script>
                        <div id="app">
                            <button
                                id="show-modal-servicio-btn"
                                class="btn btn-primary"
                                @click="showNuevo()"
                            >
                                Datos Cliente
                            </button>
                            <!-- use the modal component, pass in the prop -->
                            <modal v-if="showModal" @close="showModal = false">
                                <h2 slot="header">Datos Cliente</h2>
                                <div slot="body">
                                    <form>
                                        <input type="hidden" v-model="cliente.id" id="id" />
                                        <label for="nombre" class="grey-text"
                                            >Nombre</label
                                        >
                                        <input
                                            type="text"
                                            v-model="cliente.nombre"
                                            id="nombre"
                                            placeholder="Ej: Jhon"
                                            class="form-control"
                                        />
                                        <br />
                                        <label for="apellido" class="grey-text"
                                            >Apellido</label
                                        >
                                        <input
                                            type="text"
                                            v-model="cliente.apellido"
                                            id="apellido"
                                            placeholder="Ej: Doe"
                                            class="form-control"
                                        />
                                        <br />
                                        <label for="dni" class="grey-text"
                                            >DNI</label
                                        >
                                        <input
                                            type="text"
                                            v-model="cliente.dni"
                                            id="dni"
                                            placeholder="Ej: 1234567 SC"
                                            class="form-control"
                                        />
                                        <br />
                                        
                                        <label for="correo" class="grey-text"
                                            >Correo Electronico</label
                                        >
                                        <input
                                            type="text"
                                            v-model="cliente.correo"
                                            id="correo"
                                            placeholder="Ej: abcdef@xyz.com"
                                            class="form-control"
                                        />
                                        <br />

                                        <label for="telefono" class="grey-text"
                                            >Telefono</label
                                        >
                                        <input
                                            type="text"
                                            v-model="cliente.telefono"
                                            id="telefono"
                                            placeholder="Ej: 12345678"
                                            class="form-control"
                                        />
                                        <br />
                                    </form>
                                </div>

                                <div slot="footer">
                                    <button
                                        v-bind:id="'BtnGuardar'"
                                        v-bind:class="'btn btn-primary'"
                                        @click="guardar()"
                                    >
                                        Añadir
                                    </button>
                                    <button
                                        v-bind:id="'BtnModificar'"
                                        v-bind:class="'btn btn-primary'"
                                        @click="modificarTabla()"
                                    >
                                        Modificar
                                    </button>
                                    <button class="btn btn-danger" @click="closeModal()">
                                        Cerrar
                                    </button>
                                </div>
                            </modal>
                        </div>

                        <h5 v-text="this.precioTotal"></h5>	
                        <button type="button" @click="listar()">Mostrar</button>
                        <button type="button" @click="Solicitar()">Solicitar</button>

						<div class="card-deck no-gutters">
                            <!-- //////////////Lista de Servicio ////////////-->
							<div class="col-12 col-sm-6 col-md-6 col-lg-3"
                            v-for="servicio in listaservicios" :key="servicio.id">

								<div class="card h-100 mb-4 ">                    
									<div class="card-header">                                
										<h5 class="card-title m-0 p-0 font-weight-bolder text-secondary" v-text="servicio.nombre"></h5>
									</div>
									<div class="card-body text-left">
										<p class="card-text" v-text="servicio.descripcion"> </p>
										<span class="font-lead-base font-weight-bold text-muted" v-text="servicio.precio+' BOB'"></span>
										
									</div>
									<div class="card-footer">
                                        
                                        <button class="btn btn-success" v-bind:id="'btnAgregar'+servicio.id" type="button" @click="Agregar(servicio.id,servicio.precio)">Agregar</button>
                                        <button class="btn btn-danger" style="display: none" v-bind:id="'btnQuitar'+servicio.id" type="button" @click="Quitar(servicio.id,servicio.precio)">Quitar</button> 
                                    </div>
								</div>
							</div>
                            <!--     ///////////////////////////      -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</template>

<script>
import newcomponent from './newcomponent.vue';
    export default {
  components: { newcomponent },
        data(){
            return{
                
                ///DAtos del cliente
                cliente: {
                    'id': 0,
                    'dni': "",
                    'nombre': "",
                    'apellido': "",
                    'fechaNacimiento': "",
                    'correo': "",
                    'telefono': ""
                },
                /////
                index: 0,
                showModal: false,


                /////
                precioTotal: 0,
                arrayServicio : [],
                listaservicios: [],
                carritoservicios: [],
                servicio: {
                    'idServicio': 0,
                    'precioFijado': 0,
                }
                
            }
        },
        methods:{
            listar(){
                this.listaservicios = this.arrayServicio;
            },

            Agregar(servicioid,precio){
                let me = this;

                /////Busca si un elemento del carrito ya posee el idServicio
                if(me.carritoservicios.findIndex(servicio => 
                    servicio.idServicio === servicioid
                    ) != -1)
                {
                
                alert('Servicio ya esta en carrito');
                }else
                {
                    ///Se debe inicializar el objeto a quere usar
                    var servicio = {
                    'idServicio': 0,
                    'precioFijado': 0,
                    };

                    servicio.idServicio=servicioid;
                    servicio.precioFijado=precio;
                    console.log("Total "+me.precioTotal+" + Precio " +precio);
                   
                    me.precioTotal+=precio;
                    me.precioTotal = parseFloat((me.precioTotal).toPrecision())
                    console.log("Resultado"+me.precioTotal);
                    me.carritoservicios.push(servicio);
                    //console.log(this.carritoservicios);
                    document.getElementById("btnAgregar"+servicioid).style.display="none";
                    document.getElementById("btnQuitar"+servicioid).style.display="inline-block";
                    alert(" Se ha agregado");
                }

                
                
            }, 
            Quitar(servicioid){
                let me = this;
                var posicion=me.carritoservicios.findIndex(servicio => 
                    servicio.idServicio === servicioid
                    );
                /////Busca si un elemento del carrito ya posee el idServicio
                if(posicion != -1)
                {
                    console.log("Total "+me.precioTotal+" + Precio " +me.carritoservicios[posicion].precioFijado);
                    me.precioTotal-=me.carritoservicios[posicion].precioFijado;
                    me.precioTotal = parseFloat((me.precioTotal).toPrecision())
                    console.log("Resultado"+me.precioTotal);
                    
                    me.carritoservicios.splice(posicion,1);
                    document.getElementById("btnAgregar"+servicioid).style.display="inline-block";
                    document.getElementById("btnQuitar"+servicioid).style.display="none";
                    //console.log(this.carritoservicios);
                    
                alert('Servicio se elimino del carrito');
                }

                
                
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

        closeModal() {
            this.showModal = false;
        },
        showNuevo() {
            this.showModal = true;
            this.vaciarModal();
        },
        vaciarModal() {
            this.cliente.id = 0;
            this.cliente.dni = "";
            this.cliente.nombre = "";
            this.cliente.abasto = "";
            this.cliente.correo = "";
            this.cliente.telefono = "";
            setTimeout(function(){
                document.getElementById("BtnGuardar").style.display =
                "inline-block";
                document.getElementById("BtnModificar").style.display = "none";
            },1);
            
        },

        },
        
        mounted() {
            axios.get('/listaServicios').then(function(response){
                    this.arrayServicio= response.data;
                }.bind(this));
            },
    }

</script>

<style lang="scss">
    @import "../../../public/css/customcards.scss";
</style>


<template>
    <div class="container">
		<div class="row justify-content-center">			
			<div class="mx-auto">
				<div class="col-lg-12">
					<div class="text-center my-3">
						<h6 class="text-center my-5"><b>Solicitud de Servicio</b></h6>
                        <h5 v-text="this.precioTotal"></h5>	
                        <button type="button" @click="listar()">Mostrar</button>
                        <button type="button" @click="Solicitar()">Solicitar</button>

						<div class="card-deck no-gutters">

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
                nombre :'',
                descripcion : '',
                precio : 0,
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
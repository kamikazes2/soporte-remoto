<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Solicitud de Servicio</div>
                                  
                        <div class="card-body">
                            <button type="button" @click="listar()">Mostrar</button>
                            <button type="button" @click="Solicitar()">Solicitar</button>
                
                            <table border="1">
                                
                                <tbody>
                                    <tr v-for="servicio in listaservicios" :key="servicio.id">
                                        <td>
                                            <input type="hidden" v-text="servicio.id"> 
                                            <h3 v-text="servicio.nombre"></h3><br>
                                            <label v-text="servicio.descripcion"></label><br>
                                            <h5 v-text="servicio.precio"></h5><br>
                                            <button type="button" @click="Agregar(servicio.id,servicio.precio)">Agregar</button> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                    me.carritoservicios.push(servicio);
                    console.log(this.carritoservicios);
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
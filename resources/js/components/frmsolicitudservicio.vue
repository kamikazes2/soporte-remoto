<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Solicitud de Servicio</div>
                                  
                        <div class="card-body">
                            <button type="button" @click="listar()">Mostrar</button>
                
                            <table border="1">
                                
                                <tbody>
                                    <tr v-for="servicio in listaservicios" :key="servicio.id">
                                        <td>
                                            <input type="hidden" v-text="servicio.id"> 
                                            <h3 v-text="servicio.nombre"></h3><br>
                                            <label v-text="servicio.descripcion"></label><br>
                                            <h5 v-text="servicio.precio"></h5><br>
                                            <button type="button" @click="Solicitar(servicio.id,servicio.precio)">Solicitar</button> 
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
            }
        },
        methods:{
            listar(){
                this.listaservicios = this.arrayServicio;
            },
            Solicitar(servicioid,precio){
                let me = this;
                axios.post('request/nuevo-solicitud-servicio',{
                    'idCliente': 1,
                    'idServicio': servicioid,
                    'precioFijado': precio
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
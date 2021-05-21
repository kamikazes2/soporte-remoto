<template>
    <div class="container">
        <h3>Solicitud de Servicio</h3>
        <!--Listrado de Registros-->
        <form action="" method="POST">

            <!--
 -->
            <button type="button" @click="listar()">Mostrar</button>
        </form>


        <table border="1">
            
            <tbody>
                <tr v-for="servicio in arrayServicio" :key="servicio.id">
                    <td >
                        <input type="hidden" v-text="servicio.id"> 
                        <h1 v-text="servicio.nombre"></h1><br>
                        <label v-text="servicio.descripcion"></label><br>
                        <h3 v-text="servicio.precio"></h3><br>
                        <button type="button" @click="Solicitar(servicio.id,servicio.precio)">Solicitar</button> 
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                nombre :'',
                descripcion : '',
                precio : 0,
                arrayServicio : []
            }
        },
        methods:{
            listar(){
                let me = this;
                var url='/listaServicios';
                axios.get(url).then(function(response){
                    me.arrayServicio= response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            },
            Solicitar(servicioid,precio){
                let me = this;
                axios.post('request/nuevo-solicitud-servicio',{
                    'idCliente': 1,
                    'idServicio': servicioid,
                    'precioFijado': precio
                }).then(function(error){

                }).catch(function(error){
                    console.log(error);
                });
            },
        },
        mounted() {
            
        }
    }
</script>
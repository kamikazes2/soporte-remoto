<template>
    <div class="container">
        <h3>Solicitud de Servicio</h3>
        <!--Listrado de Registros-->
        <form action="" method="POST">

            <!--
            <table>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" v-model="nombre" placeholder="Nombre Servicio"></td>
                </tr>
                <tr>
                    <td>Descripcion</td>
                    <td><input type="text" v-model="descripcion" placeholder="Descripcion"></td>
                </tr>
                <tr>
                    <td>Precio</td>
                    <td><input type="number" v-model="precio" placeholder="Precio Servicio"></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button type="button" @click="nuevo()">Nuevo</button>
                        <button type="button" @click="guardar()">Guardar</button>
                    </td>
                </tr>
            </table>
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
            guardar(){
                let me = this;
                axios.post('request/nuevo-servicio',{
                    'nombre': this.nombre,
                    'descripcion': this.descripcion,
                    'precio': this.precio
                }).then(function(error){
                    me.listar();
                }).catch(function(error){
                    console.log(error);
                });               
            },
            nuevo(){
                this.nombre = '';
                this.descripcion = '';
                this.precio = '';
            },
            Solicitar(servicioid,precio){
                let me = this;
                axios.post('request/nuevo-solicitud-servicio',{
                    'idCliente': 1,
                    'idServicio': servicioid,
                    'precioFijado': precio
                }).then(function(error){
                    me.listar();
                }).catch(function(error){
                    console.log(error);
                });
            },
        },
        mounted() {
            this.listar();
        }
    }
</script>
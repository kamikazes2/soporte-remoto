<template>
    <div class="container">
        <h3>Registro de Servicio</h3>
        <!--Listrado de Registros-->
        <form action="" method="POST">
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
            <input type="text" v-model="buscar" placeholder="Nombre Servicio">
            <button type="button" @click="listar()">Buscar por Nombre</button>
        </form>
        <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="servicio in arrayServicio" :key="servicio.id">
                    <td v-text="servicio.id"></td>
                    <td v-text="servicio.nombre"></td>
                    <td v-text="servicio.descripcion"></td>
                    <td v-text="servicio.precio"></td>
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
                precio : 0.00
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
        },
        mounted() {
            this.listar();
        }
    }
</script>
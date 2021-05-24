<template>
    <div class="container">
        <h3>Registro de Servicio</h3>
        <!--Resgistro de nuevos servicios-->
       
        <button type="button" @click="nuevo()">Nuevo</button>
        <div id="itabla">
        <form action="" method="POST" >
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
                        <button  id="bguardar" type="button" @click="guardar()">Guardar</button>
                    </td>
                </tr>
            </table>

            <!--<button type="button" @click="showTodo()">Mostrar Todos los Servicios</button> -->
        </form>
        </div>
        
        <!--Listrado de Registros-->
        <div>
            Buscar: <input v-model="search">
            <button type="button" @click="filtrarServicios()">Mostrar</button>
            
        </div>
        <div>
            <bootstrap-4-datatable :columns="columns" :data="rows" :filter="filter" :per-page="perPage"></bootstrap-4-datatable>
            <bootstrap-4-datatable-pager v-model="page" type="abbreviated"></bootstrap-4-datatable-pager>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                ///Atributos del servicio
                nombre :'',
                descripcion : '',
                precio : '',
                search: '',
                arrayServicio : [],
                totalServicios: [],
                //////////////

                /////Necesario para Data Table
                columns: [{
                        label: 'id',
                        field: 'id'
                    },
                    {
                        label: 'nombre',
                        field: 'nombre'
                    },
                    {
                        label: 'descripcion',
                        field: 'descripcion'
                    },
                    {
                        label: 'precio',
                        field: 'precio'
                    }
                ],
                rows: [],
                page: 1,
                filter:  '',
                perPage: 12,

                /////
            }
        },
        methods:{

            ////Aca mantengo rows que es el total y solo anhado lo que si coinciden al arrayServicios
            filtrarServicios(){
                let me = this;
                let search= this.search;
                
                var i;
                if(search==''){
                    this.rows=me.arrayServicio;
                }else{
                    this.rows=[];
                for (i=0; i<me.arrayServicio.length; i++){
                    var servicio = me.arrayServicio[i];
                    if(servicio.nombre.toLowerCase().indexOf(search) != -1 ||
                        servicio.descripcion.toLowerCase().indexOf(search) != -1 ||
                        servicio.precio.toString().indexOf(search) != -1 )
                            this.rows.push(servicio);
                }
                }
                //me.listar();
            },

            /////Muestra en el cuadro el arrayServicios
            listar(){
                let me = this;
                me.rows = me.arrayServicio;
            },
            
            /*listar(){
                let me = this;
                var url='/listaServicios';
                axios.get(url).then(function(response){
                    me.arrayServicio= response.data;
                })
                .catch(function(error){
                    console.log(error);
                });
            },*/
            guardar(){
                let me = this;
                if(me.nombre =='' || me.descripcion =='' || me.precio=='')
                    alert("Debe Llenar el formulario");
                else
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
                

                var x = document.getElementById("itabla");
                if (x.style.display === "none") {
                    x.style.display = "block";
                    document.getElementById("bguardar").style.display="block";
                } else {
                    x.style.display = "none";
                    document.getElementById("bguardar").style.display="none";
                }

                this.nombre = '';
                this.descripcion = '';
                this.precio = '';
            },
            getTodo: function () {
                axios.get('/listaServicios').then(function (res) {
                    this.arrayServicio = res.data;
                }.bind(this));
            },
            showTodo: function () {
                    this.rows = this.arrayServicio ;
            },
        },
        mounted() {
            this.getTodo();
            document.getElementById("itabla").style.display="none";
            document.getElementById("bguardar").style.display="none";
        }
    }
</script>
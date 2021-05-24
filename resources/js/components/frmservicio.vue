<template>
    <!-- template for the modal component -->
    <div id="contentFrmServicio">
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
    <!-- Finish template for the modal component -->
    <!-- app -->
        <div id="app">
            <button id="show-modal-servicio-btn" class="btn btn-primary" @click="showModal = true">Nuevo Servicio</button>
            <!-- use the modal component, pass in the prop -->
            <modal v-if="showModal" @close="showModal = false">
                <h3 slot="header">Nuevo Servicio</h3>
                <div slot="body">
                      <form>
                        <label for="nombre" class="grey-text">Nombre del Servicio</label>
                        <input type="text" v-model="nombre" id="nombre" placeholder="Ej: Instalacion Windows 10" class="form-control"/>
                        <br/>
                        <label for="descripcion" class="grey-text">Descripcion del Servicio</label>
                        <input type="text" v-model="descripcion" id="descripcion" placeholder="Ej: Intalacion completa de Windows 10" class="form-control"/>
                        <br/>
                        <label for="precio" class="grey-text">Precio del Servicio</label>
                        <input type="number" v-model="precio" id="precio" placeholder="Ej: 120.00" class="form-control"/>
                        <br/>
                    </form>   
                </div>
                <div slot="footer">
                    <button class="btn btn-primary" @click="guardar()" >Añadir</button>
                    <button class="btn btn-danger" @click="closeModal()">Cerrar</button>
                </div>
            </modal>
        </div>

    <!-- Tabla de la lista de servicios-->
    <div id="servicio-table-main-content">
        <div>
            Buscar: <input id="busquedaServicio" v-model="search" class="form-control" width="50px">
            <button class="btn btn-primary" type="button" @click="filtrarServicios()">Mostrar</button>
                
        </div>
            <div>
                <bootstrap-4-datatable :columns="columns" :data="rows" :filter="filter" :per-page="perPage">
                </bootstrap-4-datatable>
                <bootstrap-4-datatable-pager v-model="page" type="abbreviated"></bootstrap-4-datatable-pager>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    
    data(){
        return{
            showModal: false,
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
            perPage: 12
            /////
            
        }
    },
    methods:{
        closeModal(){
            this.showModal = false;
        },
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
                    if(
                        servicio.nombre.toLowerCase().indexOf(search) != -1 || 
                        servicio.descripcion.toLowerCase().indexOf(search) != -1 || 
                        servicio.precio.toString().indexOf(search) != -1 
                    ){
                        this.rows.push(servicio);
                    }
                }
            }

            //me.listar();
        },
        //Muestra en el cuadro el arrayServicios
        listar(){
            let me = this;
            me.rows = me.arrayServicio;
        },
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
        // document.getElementById("itabla").style.display="none";
        // document.getElementById("bguardar").style.display="none";
    },
    
}


</script>

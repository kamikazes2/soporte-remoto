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
                <h2 slot="header">Servicio</h2>
                <div slot="body">
                      <form>
                        <input type="hidden" v-model="idServicio" id="id">
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
                    <button  v-bind:class="classBtnGuardar" @click="guardar()" >Añadir</button>
                    <button v-bind:class="classBtnModificar"  @click="modificarBaseDatos()" >Modificar</button>
                    <button class="btn btn-danger" @click="closeModal()">Cerrar</button>
                </div>
            </modal>
        </div>

    <!-- Tabla de la lista de servicios-->
    <div id="servicio-table-main-content">
        <div>
            <!-- Buscar: <input id="busquedaServicio" v-model="search" class="form-control" width="50px">
            <button class="btn btn-primary" type="button" @click="filtrarServicios()">Mostrar</button> -->
                
        </div>
        <div>
            Buscar: <input id="busquedaServicio" v-model="search" class="form-control" width="50px">
            <button class="btn btn-success" @click="filtrarServicios()">Buscar</button>
            <br>
            <br>
            
        </div>
            <table id="tablaServicio" class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="bodyTabla">
                    <tr v-for="servicio in arrayServicio" :key="servicio.id">
                        <td>{{servicio.nombre}}</td>
                        <td>{{servicio.descripcion}}</td>
                        <td>{{servicio.precio}}</td>
                        <td>
                            <button class="btn btn-success btn-sm" @click="modificar(servicio.id, servicio.nombre, servicio.descripcion, servicio.precio)">Modificar</button>
                            <button class="btn btn-danger btn-sm" @click="eliminar()">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import datatable from 'datatables.net-bs4'
export default {
    data(){
        return{
            showModal: false,
            arrayServicio: [],
            idServicio: 0,
            nombre: '',
            descripcion: '',
            precio: 0.0,
            search: '',
            rows: [],
            buscado: false,
            classBtnGuardar: "btn btn-primary",
            classBtnModificar: "displayNone"
        }
    },
    mounted(){
        this.getServicios();
        document.getElementById("bodyTabla").setAttribute("style","display: none");
    },
    methods:{
        closeModal(){
            this.showModal = false;
            this.classBtnGuardar = "btn btn-primary";
            this.classBtnModificar = "displayNone";
        },
        tabla(){
            this.$nextTick(()=>{
                $('#tablaServicio').DataTable();
            });
        },
        getServicios(){
            axios.get('/listaServicios').then(function (res) {
                    this.arrayServicio = res.data;
                    this.tabla();
            }.bind(this));
        },
        filtrarServicios(){
                if(this.buscado == false){
                    this.getServicios();
                    document.getElementById("bodyTabla").removeAttribute("style");
                    this.buscado = true;
                }
                let me = this;
                let search= this.search;
                var i;
                if(search==''){
                    this.getServicios();
                    this.rows = this.arrayServicio;
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
                this.arrayServicio = this.rows;
        },
        modificar(id, nombre, descripcion, precio){
            this.nombre = nombre;
            this.descripcion = descripcion;
            this.precio = precio;
            this.classBtnGuardar = "displayNone";
            this.classBtnModificar = "btn btn-primary";
            this.showModal = true;
        },
        eliminar(){

        },
        modificarBaseDatos(){

        }
    }
}
</script>
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
            <!-- Buscar: <input id="busquedaServicio" v-model="search" class="form-control" width="50px">
            <button class="btn btn-primary" type="button" @click="filtrarServicios()">Mostrar</button> -->
                
        </div>
            <table id="tablaServicio">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>algun nombre</td>
                        <td>alguna desc</td>
                        <td>25.00</td>
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
            showModal: false
        }
    },
    mounted(){
        this.tabla()
    },
    methods:{
        closeModal(){
            this.showModal = false;
        },
        tabla(){
            this.$nextTick(()=>{
                $('#tablaServicio').DataTable();
            });
        }
    }
}
</script>
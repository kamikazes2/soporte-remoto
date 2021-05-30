<template>
    <div class="container">
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
                <tr v-for="solicitud in arrarySolicitudes" :key="solicitud.id">
                    <td>{{solicitud.nombre}}</td>
                    <td>{{solicitud.descripcion}}</td>
                    <td>{{solicitud.precio}}</td>
                    <td>
                        <!-- <button class="btn btn-success btn-sm" @click="modificar(servicio.id, servicio.nombre, servicio.descripcion, servicio.precio)">Modificar</button>
                        <button class="btn btn-danger btn-sm" @click="eliminar(servicio.id, index)">Eliminar</button> -->
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>


<script>
import datatable from 'datatables.net-bs4'
export default {
    data(){
        return{
            arrarySolicitudes: []
        }
    },
    methods:{
        createTable(){
            this.$nextTick(()=>{
                $('#tablaServicio').DataTable();
            });
        }
    },
    mounted(){
        this.createTable();
    }
}
</script>
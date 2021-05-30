<template>
    <div class="container">
        <table id="tablaAsignacion" class="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Servicio</th>
                    <th>Fecha Asignacion</th>
                    <th>Nombre Cliente</th>
                    <th>Email Cliente</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="bodyTabla">
                <tr v-for="(asig, index) in arraryAsignaciones" :key="index">
                    <td>{{asig.idAsignacion}}</td>
                    <td>{{asig.nombreServicio}}</td>
                    <td>{{asig.fecha}}</td>
                    <td>{{asig.nombreCliente}}</td>
                    <td>{{asig.email}}</td>
                    <td>{{asig.estado}}</td>
                    <td>
                        <button v-if="asig.estado == 'ASIGNADO'" style= "" @click="aceptarServicioRealizar(asig.idServicioRealizar)" class="btn btn-success custom_button">Aceptar</button>
                        <button v-if="asig.estado == 'ACEPTADO'" style= "" @click="finalizarServicioRealizar(asig.idServicioRealizar)" class="btn btn-danger custom_button">Finalizar</button>
                        <!-- <button @click="verDetalle($event)" class="btn btn-success custom_button">Detalle</button> -->
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
            arraryAsignaciones: [],
            btnDetalleActual: null
        }
    },
    methods:{
        createTable(){
            this.$nextTick(()=>{
                $('#tablaAsignacion').DataTable();
            });
        },
        async getAsignaciones(){
            var i = false;
            await axios.get('/request/get-servicios-asignados').then(function(response){
                    if(response.data!=false){
                        this.arraryAsignaciones = response.data;
                    }else{
                        i = false;
                    }
            }.bind(this));
            return i;
        },
        async aceptarServicioRealizar(idServicioRealizar){
                let me = this;
                await axios.post('/request/aceptar-servicio-realizar',{
                    'idServicioRealizar' : idServicioRealizar,
                }).then(async function(error){
                    await me.getAsignaciones(); 
                }).catch(function(error){
                    console.log(error);
                });
        },
        async finalizarServicioRealizar(idServicioRealizar){
                let me = this;
                await axios.post('/request/solicitar-finalizacion-servicio-realizar',{
                    'idServicioRealizar' : idServicioRealizar,
                }).then(async function(error){
                    await me.getAsignaciones(); 
                }).catch(function(error){
                    console.log(error);
                });
        }
    },
    async mounted(){
        await this.getAsignaciones();
        this.createTable();
    }
}
</script>


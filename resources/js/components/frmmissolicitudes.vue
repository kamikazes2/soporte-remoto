<template>
    <div class="container">
        <table id="tablaServicio" class="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre Cliente</th>
                    <th>Fecha Solicitud</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="bodyTabla">
                <tr v-for="(solicitud, index) in arrarySolicitudes" :key="index">
                    <td>{{solicitud.idSolicitud}}</td>
                    <td>{{solicitud.nombreCliente}}</td>
                    <td>{{solicitud.fechaSolicitud}}</td>
                    <td>
                        <button style= "display: none" @click="cerrarDetalle($event)" class="btn btn-danger custom_button">Cerrar</button>
                        <button @click="verDetalle($event)" class="btn btn-success custom_button">Detalle</button>
                        <div style="display:none">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Servicio</th>
                                        <th>Estado</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="detalleFactura" v-for="detalle in arrarySolicitudes[index].detalle" :key="detalle.idServicioRealizar" >
                                        <td>{{detalle.nombreServicio}}</td>
                                        <td>{{detalle.estado}}</td>
                                        <td>
                                            <button @click="finalizar(detalle.idServicioRealizar)" v-if="detalle.estado == 'ESPERA A SER FINALIZADO'" class="btn btn-success custom_button">APROBAR</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
            arrarySolicitudes: [],
            btnDetalleActual: null
        }
    },
    methods:{
        createTable(){
            this.$nextTick(()=>{
                $('#tablaServicio').DataTable();
            });
        },
        async getSolicitudes(){
            var i = false;
            await axios.get('/request/get-solicitud-servicio-usuario').then(function(response){
                    if(response.data!=false){
                        this.arrarySolicitudes = response.data;
                    }else{
                        i = false;
                    }
            }.bind(this));
            return i;
        },
        verDetalle(event){
            if(this.btnDetalleActual != null){
                this.btnDetalleActual.previousElementSibling.style.display = "none";
                this.btnDetalleActual.style.display = "block";
                this.btnDetalleActual.nextElementSibling.style.display = "none";
            }
            this.btnDetalleActual = event.target;
            this.btnDetalleActual.previousElementSibling.style.display = "block";
            this.btnDetalleActual.nextElementSibling.style.display = "block";
            this.btnDetalleActual.style.display = "none";
        },
        cerrarDetalle(event){
            event.target.style.display = "none";
            this.btnDetalleActual.style.display = "block";
            this.btnDetalleActual.nextElementSibling.style.display = "none";
        },
        async finalizar(idServicioRealizar){
                let me = this;
                await axios.post('/request/aceptar-finalizacion-servicio-realizar',{
                    'idServicioRealizar' : idServicioRealizar,
                }).then(async function(error){
                    await me.getSolicitudes(); 
                }).catch(function(error){
                    console.log(error);
                });   
        }
    },
    async mounted(){
        await this.getSolicitudes();
        this.createTable();
    }
}
</script>
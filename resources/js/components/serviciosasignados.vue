<template>
    <div class="container">

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
        <div id="app">
            <modal v-if="showModal" @close="showModal = false">
                <h2 slot="header">Solicitud Rechazo de Asignacion</h2>
                <div slot="body">
                   
                    <form class="login-register-form" id="solicitudRechazo"> <br />
                    <input type="hidden" v-model="asignacion.idAsignacion" id="id" class="form-control"/> <br />
                    <input type="text" v-model="asignacion.descripcion" placeholder="Descripcion" class="form-control"/> <br />
                    </form>
                </div>
                <div slot="footer">
                    <button
                        v-bind:id="'BtnRechazar'"
                        v-bind:class="'btn btn-danger'"
                        @click="rechazarAsignacion()"
                    >
                        Rechazar
                    </button>
                    <button class="btn btn-primary" @click="closeModal()">
                        Cerrar
                    </button>
                </div>
            </modal>
        </div>


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
                        <button style= "" @click="showRechazo(asig.idAsignacion)" class="btn btn-success custom_button">Rechazar</button>
                        <button style= "" @click="finalizarServicioRealizar(asig.idServicioRealizar)" class="btn btn-danger custom_button">Finalizar</button>
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
            btnDetalleActual: null,
            showModal: false,
            asignacion: {
                idAsignacion: 0,
                idTecnico: 0 ,
                descripcion: '',
            }
        }
    },
    methods:{
        createTable(){
            this.$nextTick(()=>{
                $('#tablaAsignacion').DataTable();
            });
        },
        showRechazo(idAsignacion) {
            this.showModal = true;
            this.asignacion.idAsignacion=idAsignacion;
        },
        closeModal() {
            this.showModal = false;
        },
        vaciarModal(){
            this.asignacion.idAsignacion = 0;
            this.asignacion.descripcion = '';
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
        async rechazarAsignacion(){
            let me = this.asignacion;

            await axios.get('/request/get-tecnico-iduser').then(function(response){
                if(response.data!=false){
                    me.idTecnico = response.data.idTecnico;
                }else{
                    i = false;
                }
            }.bind(this));

            await axios.post('/request/rechazar-asignacion-servicio',{
                'idAsignacion' : me.idAsignacion,
                'idTecnico' : me.idTecnico,
                'descripcion' : me.descripcion
            }).then(async function(error){
                await me.getAsignaciones();
                await me.vaciarModal();
                await me.closeModal();
                alert("Solicitud Enviada Correctamente"); 
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


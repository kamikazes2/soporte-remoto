<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mis Solicitudes</div>

                    <div class="card-body">
                            <button type="button" @click="listar()">Mostrar</button>
                
                            <table border="1">
                                
                                <tbody>
                                    <tr v-for="solicitud in arraySolicitudes" :key="solicitud.idSolicitud">

                                        <td @click="mostrarDetalle(solicitud)">
                                        <label v-text="'Solicitud:  '+solicitud.idSolicitud"></label> <br>
                                        <label v-text="'Fecha de Solicitud:  '+solicitud.fechaSolicitud"></label> <br>
                                        
                                        </td>

                                        <td v-bind:id="solicitud.idSolicitud" >

                                            <dl>
                                                <div v-for="servicio in solicitud.arrayServicios" :key="servicio.idServicioRealizar">
                                                    <dt v-text="'Servicio:   '+servicio.nombreServicio"> </dt>
                                                    <dd v-text="'Descripcion:   '+servicio.descripcionServicio"></dd>
                                                    <dd v-text="'Precio:   '+servicio.precioFijado"></dd>
                                                    <dd v-text="'Estado:   '+servicio.estado"></dd>
                                                    <dd v-text="'Tecnico:   '+servicio.nombreTecnico"></dd>
                                                    <button v-if="servicio.estado==='ASIGNADO'" type="button" @click="Terminar(servicio.idServicioRealizar)">Finalizar Servicio</button>
                                                    <dd></dd>
                                                </div>
                                            </dl>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    

                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        data() {
            return {
                arraySolicitudes: [],
                idSolicitud : 0,
                fechaSolicitud: '',
                arrayServicios: []
                
            }
        },
        methods: {
        mounted() {
            console.log('Component mounted.')
        },
        mostrarDetalle(solicitud){
                
                var x = document.getElementById(solicitud.idSolicitud);
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
                this.arrayServicios=solicitud.arrayServicios;
                
            },
            Terminar(id){
                
                axios.post('request/finalizar-servicio',{
                    'idServicioRealizar': id,
                }).then(function(error){
                    alert("Se finalizo el servicio");
                }).catch(function(error){
                    console.log(error);
                }); 
                
            },
        listar: function () {

            axios.get('/listarMisSolicitudes').then(function (res) {
                this.arraySolicitudes = res.data;
            }.bind(this));


        },
        
        },
       
    }   
</script>

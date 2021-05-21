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

                                        <td @click="mostrarDetalle(solicitud.idSolicitud)">
                                        <label v-text="solicitud.idSolicitud"></label> <br>
                                        <label v-text="solicitud.fechaSolicitud"></label> <br>
                                        
                                        </td>

                                        <td v-bind:id="solicitud.idSolicitud" >

                                            <dl>
                                                <div v-for="servicio in arrayServicios" :key="servicio.id">
                                                    <dt v-text="servicio.nombreServicio"> aa</dt>
                                                    <dd v-text="servicio.descripcionServicio">aa</dd>
                                                    <dd v-text="servicio.precioFijado">aa</dd>
                                                    <dd v-text="servicio.estado">aa</dd>
                                                    <dd v-text="servicio.nombreTecnico">aa</dd>
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
        mostrarDetalle(idSolicitud){
                var x = document.getElementById(idSolicitud);
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }

            },
            listar: function () {

                axios.get('/listarMisSolicitudes').then(function (res) {
                    this.arraySolicitudes = res.data;
                }.bind(this));
            },
        },
        
    }   
</script>

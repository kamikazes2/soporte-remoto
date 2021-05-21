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
                                                <div v-for="servicio in arrayServicios" :key="servicio.idServicio">
                                                <dt v-text="servicio.nombreServicio"> </dt>
                                                    <dd v-text="servicio.descripcionServicio"></dd>
                                                    <dd v-text="servicio.precioFijado"></dd>
                                                    <dd v-text="servicio.estado"></dd>
                                                    <dd v-text="servicio.nombreTecnico"></dd>
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
                arrayServicios: [{
                        nombreServicio: '',
                        descripcionServicio: '',
                        precioFijado: 0,
                        estado: '',
                        nombreTecnico: '',
                    }]
                
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
                console.log(this.arraySolicitudes);
                axios.get('/listarMisSolicitudes').then(function (res) {
                    this.arraySolicitudes = res.data;
                }.bind(this));
                console.log(this.arraySolicitudes);
            },
        },
        
    }   
</script>

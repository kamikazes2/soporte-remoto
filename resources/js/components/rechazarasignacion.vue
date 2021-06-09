<template>
    <!-- template for the modal component -->
	<div id="contentFrmPersonal">
        
        <!-- Tabla de la lista de servicios-->
        <div id="servicio-table-main-content">
            <div>
               
                <button class="btn btn-success" @click="showhide()">
                    Mostrar/Ocultar Tabla
                </button>
                <button class="btn btn-success" @click="refresh()">
                    Refresh
                </button>
                <br />
                <br />
            </div>
            <table id="tablaRechazarServicio" class="table">
                <thead>
                    <tr>
                        <th>Tecnico</th>
                        <th>Servicio</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="bodyTabla">
                    <tr v-for="rechazoAsignacion in arrayRechazoAsignacion" :key="rechazoAsignacion.id">
                        <td>{{ rechazoAsignacion.nombreTecnico }}</td>
                        <td>{{ rechazoAsignacion.nombreServicio }}</td>
                        <td>{{ rechazoAsignacion.descripcion }}</td>
                        <td>{{ rechazoAsignacion.estado }}</td>
                        <td>
                            <button
                                class="btn btn-success btn-sm"
                                @click="
                                    aceptarRechazoAsignacion(rechazoAsignacion.id, rechazoAsignacion.idServicioRealizar, rechazoAsignacion.idPersonal)
                                "
                            >
                                Aceptar
                            </button>

                            <button
                                class="btn btn-danger btn-sm"
                                @click="naaaaa()"
                            >
                                Declinar
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                ////Rechazo Asignacion
                id: 0,
                descripcion: '',
                estado: '',
                
                ///Asignacion
                idAsignacion: 0,
                
                ////ServicioREalizar
                idServicioRealizar: 0,
                
                ////Servicio
                idServicio: 0,
                nombreServicio: '',
                ///Tenico
                idTecnico: 0,
                disponible: '',
                /////
                ////Lista Solicitudes de Rechazo
                arrayRechazoAsignacion: [],
                ////
                ////Variables Globales, Tabla
                buscado: false,
                showtable: false,

            }
        },
        mounted() {
            this.getRechazarAsignacion();
            document
                .getElementById("bodyTabla")
                .setAttribute("style", "display: none");
        },
        methods: {
            tabla() {
            this.$nextTick(() => {
                $("#tablaRechazarServicio").DataTable();
            });
            },
            showhide(){
            if(this.showtable){
                this.showtable=false;
                document.getElementById("bodyTabla").setAttribute("style","display: none");
            }else{
                this.showtable=true;
                document.getElementById("bodyTabla").removeAttribute("style");
            }
            },
            refresh(){
                this.getRechazarAsignacion();
            },
            aceptarRechazoAsignacion(){

            },

            async getRechazarAsignacion() {
            
            await axios.get("/request/get-rechazar-asignacion").then(
                function(res) {
                    this.arrayRechazoAsignacion = res.data.rechazoasignacion;
                    this.tabla();
                }.bind(this)
            );
            
            },

            
            /////Aceptar
            
            async VerificarBaseDatos() {
            ///Verifica que los datos locales y la BD sean Iguales

            //var local = [...this.arrayServicio];
            var localRechazoAsignacion = Array.from(this.arrayRechazoAsignacion);
            this.refresh();

            if (JSON.stringify(localRechazoAsignacion) == JSON.stringify(this.arrayRechazoAsignacion)) {
                console.log("Tablas Integras");
                return true;
            }

            //this.arrayEspecialidad= Array.from(localEspecialidades);
            console.log("Tablas Distintas");
            alert("Posiblemente necesite actualizar su tabla con la BD");
            return false;
            },

            async aceptarRechazoAsignacion(id,  idServicioRealizar, idPersonal) {
            // console.log("primera vez q menciona servicio");
                
                var r = confirm("Esta Seguro de Aceptar la Solicitud?");
                if (r == true) {
                if (this.VerificarBaseDatos()) {
                    await this.modificarEstadoServicioRealizar(idServicioRealizar, idPersonal);

                    


                    await axios
                        .post("request/aceptar-rechazar-asignacion", {
                            'id': id,
                        })
                        .then(function(error) {
                            alert("Se acepto");
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                    
                }
                }
            this.refresh();
        },
        async modificarEstadoServicioRealizar(idServicioRealizar, idPersonal){

            
            

                await axios
                        .post("request/update_Pendiente", {
                            'idServicioRealizar': idServicioRealizar
                        })
                        .then(function(error) {
                            console.log("Pendiente");
                        })
                        .catch(function(error) {
                            console.log(error);
                        });

                await axios
                        .post("request/asignar-servicios-solicitados", {
                        })
                        .then(function(error) {
                            alert("Se Reasigno");
                        })
                        .catch(function(error) {
                            console.log(error);
                        });

                await axios
                        .post("request/habilitar_personal", {
                            'idPersonal': idPersonal
                        })
                        .then(function(error) {
                            console.log("Habilitado");
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
        }
           
        }
    }   
</script>

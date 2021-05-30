<template>
    <!-- template for the modal component -->
	<div id="contentFrmPersonal">
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
            <button
                id="show-modal-servicio-btn"
                class="btn btn-primary"
                @click="showNuevo()"
            >
                Registrar nuevo Personal
            </button>
            <!-- use the modal component, pass in the prop -->
            <modal v-if="showModal" @close="showModal = false">
                <h2 slot="header">Personal</h2>
                <div slot="body">
                   
                    <form class="login-register-form" id="nuevaCuentaForm"> <br />
                    <input type="hidden" v-model="idPersonal" id="id" class="form-control"/> <br />
                    <input type="text" v-model="dni" placeholder="DNI" class="form-control"/> <br />
                    <input type="text" v-model="nombre" placeholder="Nombre" class="form-control"/> <br />
                    <input type="text" v-model="apellido" placeholder="Apellido" class="form-control"/> <br />
                    <input type="date" v-model="fechaNacimiento" placeholder="Fecha de Nacimiento" class="form-control"/> <br />
                    <input type="text" v-model="usuario" placeholder="usuario" class="form-control"/> <br />
                    <input type="password" v-model="password" placeholder="Contraseña" class="form-control"/> <br />
                    <label for="especialidad" class="grey-text"
                            >Especialidad</label
                        >
                        <multiselect
                            v-model="especialidades"
                            :options="arrayEspecialidad"
                            :multiple="true"
                            :close-on-select="false"
                            :clear-on-select="false"
                            :preserve-search="true"
                            placeholder="Escoja una o mas especialidades"
                            label="nombre"
                            track-by="id"
                            :preselect-first="false"
                        >
                            <template slot="selection"
                                slot-scope="{ values, search, isOpen }">
                                <span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">
                                    {{ values.length }} especialidades seleccionadas
                                </span>
                            </template>
                        </multiselect>
                        <!--
                        <pre class="language-json"><code>{{ especialidades  }}</code></pre>
                        -->
                    <button @click="signUp()" >crear</button>
                </form>
                </div>
                <div slot="footer">
                    <button
                        v-bind:id="'BtnGuardar'"
                        v-bind:class="'btn btn-primary'"
                        @click="guardar()"
                    >
                        Añadir
                    </button>
                    <button
                        v-bind:id="'BtnModificar'"
                        v-bind:class="'btn btn-primary'"
                        @click="modificarTabla()"
                    >
                        Modificar
                    </button>
                    <button class="btn btn-danger" @click="closeModal()">
                        Cerrar
                    </button>
                </div>
            </modal>
        </div>

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
            <table id="tablaPersonal" class="table">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>FechaNacimiento</th>
                        <th>Especialidad(es)</th>
                        <th>Disponibilidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="bodyTabla">
                    <tr v-for="personal in arrayPersonal" :key="personal.id">
                        <td>{{ personal.dni }}</td>
                        <td>{{ personal.nombre }}</td>
                        <td>{{ personal.apellido }}</td>
                        <td>{{ personal.fechaNacimiento }}</td>
                        <td >
                            <ul >
                                <div  v-for="especialidad in personal.arrayEspecialidades" :key="especialidad.idEspecialidad">
                                    <dt v-text="especialidad.nombre"></dt>
                                </div>
                            </ul>
                        </td>
                        <td>{{ personal.disponibilidad }}</td>
                        <td>
                            <button
                                class="btn btn-success btn-sm"
                                @click="
                                    modificar(
                                        personal.idPersonal,
                                        personal.dni,
                                        personal.nombre,
                                        personal.apellido,
                                        personal.fechaNacimiento,
                                        personal.arrayEspecialidades,
                                    )
                                "
                            >
                                Modificar
                            </button>

                            <button
                                class="btn btn-danger btn-sm"
                                @click="eliminar(personal.idPersonal, index)"
                            >
                                Eliminar
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
                ////Form Registro Atributos
                
                ///PErsonal
                idPersonal: 0,
                dni: '',
                nombre: '',
                apellido: '',
                fechaNacimiento: '',
                disponibilidad: '',
                ////Usuario
                idUsuario: 0,
                usuario :'',
                idUsuario : '',
                tipoUsuario:'',
                password: '',
                ///Tenico
                idTecnico: 0,
                /////
                ////Lista Especialidades
                arrayEspecialidad: [],
                especialidades: [],
                ////
                ////Variables Globales, Tabla
                arrayPersonal: [],
                showModal: false,
                buscado: false,
                showtable: false,
                search: '',

            }
        },
        mounted() {
            this.getEspecialidades();
            document
                .getElementById("bodyTabla")
                .setAttribute("style", "display: none");
        },
        methods: {
            tabla() {
            this.$nextTick(() => {
                $("#tablaPersonal").DataTable();
            });
            },
            showNuevo() {
                this.showModal = true;
                this.vaciarModal();
            },
            closeModal() {
            this.showModal = false;
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
                this.getPersonal();
                this.getEspecialidades();
            },
            vaciarModal() {
            this.idPersonal = 0;
            this.nombre = "";
            this.apellido = "";
            this.fechaNacimiento = "";
            this.disponibilidad = "";
            this.idUsuario = 0;
            this.usuario = "";
            this.tipoUsuario = "";
            this.password = "";
            this.idTecnico = 0;

            setTimeout(function(){
                document.getElementById("BtnGuardar").style.display =
                "inline-block";
                document.getElementById("BtnModificar").style.display = "none";
            },1);
            
            },
            getEspecialidades() {
            
            axios.get("/request/lista-especialidad").then(
                function(res) {
                    this.arrayEspecialidad = res.data;
                    this.tabla();
                }.bind(this)
            );
            },

            getPersonal() {
            /*
            axios.get("/request/lista-especialidad").then(
                function(res) {
                    this.arrayPersonal = res.data;
                    this.tabla();
                }.bind(this)
            );
            */
            },
        
        }
    }   
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
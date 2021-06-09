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
                    <input type="text" v-model="email" placeholder="Correo Electronico" class="form-control"/> <br />
                    <input type="password" v-model="password" placeholder="Contraseña" class="form-control"/> <br />
                    
                    <label for="Cargo" class="grey-text"
                            >Cargo</label
                        >
                        <multiselect
                            v-model="cargo" 
                            :options="arrayCargo" 
                            :searchable="false" 
                            :close-on-select="false" 
                            :show-labels="false" 
                            placeholder="Escoja un Cargo"
                        >
                            
                        </multiselect> <br />
                    
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
                    
                </form>
                </div>
                <div slot="footer">
                    <button
                        v-bind:id="'BtnGuardar'"
                        v-bind:class="'btn btn-primary'"
                        @click="signUp()"
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
                        
                        <td v-if="personal.disponible==1"> Disponible</td>
                        <td v-else> No Disponible</td>
                        
                        <td>
                            <button
                                class="btn btn-success btn-sm"
                                @click="
                                    modificar(
                                        personal.id,
                                        personal.idUsuario,
                                        personal.dni,
                                        personal.nombre,
                                        personal.apellido,
                                        personal.fechaNacimiento,
                                        personal.arrayEspecialidades
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
                disponible: '',
                ////Usuario
                idUsuario: 0,
                usuario :'',
                idUsuario : '',
                tipoUsuario:'',
                password: '',
                cargo: '',
                email: '',
                user: {
                    nombre: "",
                    usuario: "",
                    email: "",
                    tipoUsuario: "",
                    id: 0
                },
                ///Tenico
                idTecnico: 0,
                idJefeTecnico: 0,

                /////
                ////Lista Especialidades
                arrayEspecialidad: [],
                especialidades: [],
                ////
                ////Variables Globales, Tabla
                arrayCargo: [ 'tecnico', 'jefeTecnico'],
                arrayPersonal: [],
                showModal: false,
                buscado: false,
                showtable: false,
                search: '',

            }
        },
        mounted() {
            this.getPersonal();
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
            this.dni="";
            this.nombre = "";
            this.apellido = "";
            this.fechaNacimiento = "";
            this.disponible = "";
            this.idUsuario = 0;
            this.usuario = "";
            this.tipoUsuario = "";
            this.password = "";
            this.idTecnico = 0;
            this.especialidades=[];


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
            
            axios.get("/request/get-all-personales-with-especialidades").then(
                function(res) {
                    this.arrayPersonal = res.data;
                    this.tabla();
                }.bind(this)
            );
            
            },

            ///Guardar////
            signUp(){
                console.log(this);
                axios.post("request/nuevo-usuario",{
                    nombre: this.nombre,
                    usuario: this.usuario,
                    email: this.email,
                    password: this.password,
                    tipoUsuario: this.cargo
                }).then((response) => {
                    console.log("Entrando al then");
                    console.log(response.data);
                        if(response.data.error == true){
                            console.log("error =true");
                            alert(response.data.message);
                        }else{
                            alert("Usuario creado correctamente");
                            this.SavePersonal(response.data.user);
                            //this.user=response.data.user;
                        }
                    })
                    .catch(function(error){
                    console.log(error);
                });
                
                console.log("thisUsera");
                console.log(this.user);
            },
            SavePersonal(user){
                axios.post('/request/nuevo-personal',{
                    'idUsuario': user.id,
                    'dni': this.dni,
                    'nombre': user.nombre,
                    'apellido': this.apellido,
                    'fechaNacimiento': this.fechaNacimiento
                }).then((response) => {
                    console.log(response.data);
                        if(response.data.error == true){
                            alert(response.data.message);
                        }else{
                            alert("PErsonal creado correctamente");
                            this.SaveNuevaRelacion(response.data.id);
                            this.SaveEspecialidades(response.data.id);
                        }
                    }).catch(function(error){
                    console.log(error);
                });
                
            },
            SaveNuevaRelacion(id){
                var url = "";
                if(this.cargo=="tecnico"){
                    url = "request/nuevo-tecnico2";
                }
                if(this.cargo=="jefeTecnico"){
                    url = "request/nuevo-jefe-tecnico2";
                }
                axios.post(url,{
                    'idPersonal': id,
                }).then((response) => {
                    console.log(response.data);
                        if(response.data.error == true){
                            alert(response.data.message);
                        }else{
                            alert("Relacion creado correctamente");

                        }
                    }).catch(function(error){
                    console.log(error);
                });
                
            },
            SaveEspecialidades(id){
                
                axios.post("request/create-or-update-especialidad-personal",{
                    'idPersonal': id,
                    'idEspecialidades': this.especialidades,
                }).then((response) => {
                    console.log(response.data);
                        if(response.data.error == true){
                            alert(response.data.message);
                        }else{
                            alert("Relacion Especialidades creado correctamente");

                        }
                    }).catch(function(error){
                    console.log(error);
                });
                
            },
            //////////
            /////Modificar
            modificar(id, idUsuario, dni,nombre, apellido, fechaNacimiento, especialidad) {
            this.idPersonal = id;
            this.idUsuario= idUsuario;
            this.dni = dni;
            this.nombre = nombre;
            this.apellido = apellido;
            this.fechaNacimiento = fechaNacimiento;
            this.especialidades= especialidad;
            this.showModal = true;
            setTimeout(function(){
                document.getElementById("BtnGuardar").style.display = "none";
                document.getElementById("BtnModificar").style.display =
                "inline-block";
            },1);
            
            },

            VerificarBaseDatos() {
            ///Verifica que los datos locales y la BD sean Iguales

            //var local = [...this.arrayServicio];
            var localPersonales = Array.from(this.arrayPersonal);
            this.refresh();

         

            if (JSON.stringify(localPersonales) == JSON.stringify(this.arrayPersonal)) {
                console.log("Tablas Integras");
                return true;
            }

            //this.arrayEspecialidad= Array.from(localEspecialidades);
            console.log("Tablas Distintas");
            alert("Posiblemente necesite actualizar su tabla con la BD");
            return false;
            },

            modificarTabla() {
            // console.log("primera vez q menciona servicio");

                if (this.VerificarBaseDatos()) {
                    axios
                        .post("request/update-personal", {
                            idPersonal: this.idPersonal,
                            idUsuario: this.idUsuario,
                            dni: this.dni,
                            nombre: this.nombre,
                            apellido: this.apellido,
                            fechaNacimiento: this.fechaNacimiento
                        })
                        .then(function(error) {
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                    this.SaveEspecialidades(this.idPersonal);
                    
                }
            this.vaciarModal();
            this.refresh();
        },
            ////Eliminar
            eliminar(idPersonal, index) {
                    alert("En construccion");
                    /*
                if (confirm("Estas seguro de eliminar?")) {
                    axios
                        .post("/request/eliminar-especialidad/" + idEsp, {
                            _method: "delete"
                        })
                        .then(
                            response => {
                                if (response.data == "ExisteTransaccion") {
                                    alert(
                                        "No se puede eliminar, Existe una transaccion"
                                    );
                                } else {
                                    ("Se elimino correctamente");
                                    this.refresh();
                                }
                            },
                            error => {
                                console.log(
                                    "Puede que el servicio haya sido utilizado previamente"
                                );
                                console.log(response);
                                // error callback
                            }
                        );
                }
                */
            },
        }
    }   
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
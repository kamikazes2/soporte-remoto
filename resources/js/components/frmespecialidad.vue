<template>
    <!-- template for the modal component -->
    <div id="contentFrmEspecialidad">
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
                Nueva Especialidad
            </button>
            <!-- use the modal component, pass in the prop -->
            <modal v-if="showModal" @close="showModal = false">
                <h2 slot="header">Especialidad</h2>
                <div slot="body">
                    <form>
                        <input type="hidden" v-model="idEspecialidad" id="id" />
                        <label for="nombre" class="grey-text"
                            >Nombre de la Especialidad</label
                        >
                        <input
                            type="text"
                            v-model="nombre"
                            id="nombre"
                            placeholder="Ej: Windows 10"
                            class="form-control"
                        />
                        <br />
                        <label for="descripcion" class="grey-text"
                            >Descripcion de la Especialidad</label
                        >
                        <input
                            type="text"
                            v-model="descripcion"
                            id="descripcion"
                            placeholder="Ej: Soporte para sistema operativo Windows 10"
                            class="form-control"
                        />
                        <br />
                        
                        
                    </form>
                </div>
                <div slot="footer">
                    <button
                        v-bind:id="'BtnGuardar'"
                        v-bind:class="classBtnGuardar"
                        @click="guardar()"
                    >
                        Añadir
                    </button>
                    <button
                        v-bind:id="'BtnModificar'"
                        v-bind:class="classBtnModificar"
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
                 <!-- 
                     Buscar:
                <input
                    id="busquedaServicio"
                    v-model="search"
                    class="form-control"
                    width="50px"
                />-->
                <button class="btn btn-success" @click="showhide()">
                    Mostrar/Ocultar Tabla
                </button>
                 
                <button class="btn btn-success" @click="refresh()">
                    Actualizar Tabla
                </button>
                <br />
                <br />
            </div>
            <table id="tablaEspecialidad" class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="bodyTabla">
                    <tr v-for="especialidad in arrayEspecialidad" :key="especialidad.id">
                        <td>{{ especialidad.nombre }}</td>
                        <td>{{ especialidad.descripcion }}</td>
                        <td>
                            <button
                                class="btn btn-success btn-sm"
                                @click="
                                    modificar(
                                        especialidad.id,
                                        especialidad.nombre,
                                        especialidad.descripcion
                                    )
                                "
                            >
                                Modificar
                            </button>

                            <button
                                class="btn btn-danger btn-sm"
                                @click="eliminar(especialidad.id, index)"
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
import datatable from "datatables.net-bs4";
import Multiselect from "vue-multiselect";
Vue.component("multiselect", Multiselect);

export default {
    data() {
        return {  
            index: 0,
            showModal: false,
            arrayEspecialidad: [],
            idEspecialidad: 0,
            nombre: "",
            descripcion: "",
            search: "",
            rows: [],
            buscado: false,
            showtable: false,
            classBtnGuardar: "btn btn-primary",
            classBtnModificar: "displayNone",
            
        };
    },
    mounted() {
        this.getEspecialidades();
        document
            .getElementById("bodyTabla")
            .setAttribute("style", "display: none");
    },
    methods: {
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
            this.getEspecialidades();
        },
        closeModal() {
            this.showModal = false;
            this.classBtnGuardar = "btn btn-primary";
            this.classBtnModificar = "display: none";
        },
        tabla() {
            this.$nextTick(() => {
                $("#tablaEspecialidad").DataTable();
            });
        },
        getEspecialidades() {
            axios.get("/request/lista-especialidad").then(
                function(res) {
                    this.arrayEspecialidad = res.data;
                    this.tabla();
                }.bind(this)
            );
            document.getElementById("bodyTabla").removeAttribute("style");
            
        },
        /*
        filtrarServicios() {
            if (this.buscado == false) {
                this.getEspecialidades();
                document.getElementById("bodyTabla").removeAttribute("style");
                this.buscado = true;
            }
            let me = this;
            let search = this.search;
            var i;
            if (search == "") {
                this.getEspecialidades();
                this.rows = this.arrayEspecialidad;
            } else {
                this.rows = [];
                for (i = 0; i < me.arrayEspecialidad.length; i++) {
                    var especialidad = me.arrayEspecialidad[i];
                    if (
                        especialidad.nombre.toLowerCase().indexOf(search) != -1 ||
                        especialidad.descripcion.toLowerCase().indexOf(search) !=
                            -1 
                    )
                        this.rows.push(especialidad);
                }
            }
            this.arrayEspecialidad = this.rows;
        },
        */
        modificar(id, nombre, descripcion) {
            this.idEspecialidad = id;
            this.nombre = nombre;
            this.descripcion = descripcion;
            this.classBtnGuardar = "display: none";
            this.classBtnModificar = "btn btn-primary";
            this.showModal = true;
            setTimeout(function(){
                document.getElementById("BtnGuardar").style.display = "none";
                document.getElementById("BtnModificar").style.display =
                "inline-block";
            },1);
            
        },
        eliminar(idEsp, index) {
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
        },
        VerificarBaseDatos() {
            ///Verifica que los datos locales y la BD sean Iguales

            //var local = [...this.arrayServicio];
            var localEspecialidades = Array.from(this.arrayEspecialidad);
            this.refresh();

         

            if (JSON.stringify(localEspecialidades) == JSON.stringify(this.arrayEspecialidad)) {
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
            var especialidad = {
                "id" : 0,
                "nombre" : '',
                "descripcion" : ''
            }
            especialidad.id = this.idEspecialidad;
            especialidad.nombre = this.nombre;
            especialidad.descripcion = this.descripcion;

            console.log("Se construyo el servicio");
            let local = this.arrayEspecialidad;

            var posicion = local.findIndex(x => x.id === this.idEspecialidad);
           

            if (this.verificarTabla(local, especialidad, posicion)) {
                if (this.VerificarBaseDatos()) {
                    axios
                        .post("request/actualizar-especialidad", {
                            id: especialidad.id,
                            nombre: especialidad.nombre,
                            descripcion: especialidad.descripcion
                        })
                        .then(function(error) {})
                        .catch(function(error) {
                            console.log(error);
                        });

                }
            }
            this.getEspecialidades();
        },
        verificarTabla(listaEspecialidad, especialidad, posicion) {
            ////Verifica si no existe repetido, osea es posible realizar el cambio.
            //console.log("Entrando a VeridicarTabla: 1 Servicio, 2 posicion");
            // console.log(servicio);
            //console.log(posicion);
            var i;
            for (i = 0; i < listaEspecialidad.length; i++) {
                if (i != posicion) {
                    //console.log("Antes del if donde entra servicio" + i);
                    if (
                        especialidad.nombre == listaEspecialidad[i].nombre ||
                        especialidad.descripcion == listaEspecialidad[i].descripcion
                    ) {
                        console.log(
                            "Se encontro un elemento similar en:" + posicion
                        );
                        alert(
                            "Posiblemente ya exista la especialidad (nombre/descripcion)"
                        );
                        return false;
                    }
                }
            }
            console.log("Todo en orden, no se encontro alguno similar");
            return true;
        },
        showNuevo() {
            this.showModal = true;
            this.vaciarModal();
        },
        guardar() {
            let me = this;
            var especialidad = {
                "id" :  me.idEspecialidad,
                "nombre" : me.nombre,
                "descripcion" : me.descripcion
            }
            if (me.nombre == "" || me.descripcion == "")
                alert("Debe Llenar el formulario");
            else if (this.VerificarBaseDatos() && this.verificarTabla(this.arrayEspecialidad, especialidad, -1))
                axios
                    .post("request/nuevo-especialidad", {
                        nombre: this.nombre,
                        descripcion: this.descripcion
                    })
                    .then((response) => {
                        me.getEspecialidades();
                        console.log(response);
                        //alert(response.data + " Se anhadio correctamente el servicio");
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            this.closeModal();
        },
       
        vaciarModal() {
            this.id = 0;
            this.nombre = "";
            this.descripcion = "";
            this.classBtnGuardar = "btn btn-primary";
            //this.classBtnModificar = "display: none";
            setTimeout(function(){
                document.getElementById("BtnGuardar").style.display =
                "inline-block";
                document.getElementById("BtnModificar").style.display = "none";
            },1);
            
        }
    }
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<template>
    <!-- template for the modal component -->
    <div id="contentFrmServicio">
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
            <button id="show-modal-servicio-btn" class="btn btn-primary" @click="showNuevo()">Nuevo Servicio</button>
            <!-- use the modal component, pass in the prop -->
            <modal v-if="showModal" @close="showModal = false">
                <h2 slot="header">Servicio</h2>
                <div slot="body">
                      <form>
                        <input type="text" v-model="idServicio" id="id">
                        <label for="nombre" class="grey-text">Nombre del Servicio</label>
                        <input type="text" v-model="nombre" id="nombre" placeholder="Ej: Instalacion Windows 10" class="form-control"/>
                        <br/>
                        <label for="descripcion" class="grey-text">Descripcion del Servicio</label>
                        <input type="text" v-model="descripcion" id="descripcion" placeholder="Ej: Intalacion completa de Windows 10" class="form-control"/>
                        <br/>
                        <label for="especialidad" class="grey-text">Especialidad</label>
                        <select id="especialidad" v-for="especialidad in arrayEspecialidad" :key="especialidad.id">
                            <option  v-text="especialidad.nombre"   ></option>
                        </select>
                        <input type="number" v-model="especialidad" id="especialidad" placeholder="Ej: 120.00" class="form-control"/>
                        <br/>
                        <label for="precio" class="grey-text">Precio del Servicio</label>
                        <input type="number" v-model="precio" id="precio" placeholder="Ej: 120.00" class="form-control"/>
                        <br/>
                    </form>   
                </div>
                <div slot="footer">
                    <button v-bind:id="BtnGuardar" v-bind:class="classBtnGuardar"  @click="guardar()" >Añadir</button>
                    <button v-bind:id="BtnModificar" v-bind:class="classBtnModificar"   @click="modificarTabla()" >Modificar</button>
                    <button class="btn btn-danger" @click="closeModal()">Cerrar</button>
                </div>
                <!-- 
                    <button v-bind:id="BtnGuardar" v-bind:class="classBtnGuardar"  @click="guardar()" >Añadir</button>
                    <button v-bind:class="classBtnModificar"  @click="modificarBaseDatos()" >Modificar</button>
                 -->
            </modal>
        </div>

    <!-- Tabla de la lista de servicios-->
    <div id="servicio-table-main-content">
        <div>
            <!-- Buscar: <input id="busquedaServicio" v-model="search" class="form-control" width="50px">
            <button class="btn btn-primary" type="button" @click="filtrarServicios()">Mostrar</button> -->
                
        </div>
        <div>
            Buscar: <input id="busquedaServicio" v-model="search" class="form-control" width="50px">
            <button class="btn btn-success" @click="filtrarServicios()">Buscar</button>
            <button class="btn btn-success" @click="getServicios()">Refresh</button>
            <br>
            <br>
            
        </div>
            <table id="tablaServicio" class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="bodyTabla">
                    <tr v-for="servicio in arrayServicio" :key="servicio.id">
                        <td>{{servicio.nombre}}</td>
                        <td>{{servicio.descripcion}}</td>
                        <td>{{servicio.precio}}</td>
                        <td>
                            <button class="btn btn-success btn-sm" @click="modificar(servicio.id, servicio.nombre, servicio.descripcion, servicio.precio)">Modificar</button>
                            <button class="btn btn-danger btn-sm" @click="eliminar(servicio.id, index)">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import datatable from 'datatables.net-bs4'
export default {
    data(){
        return{
            index: 0,
            showModal: false,
            arrayServicio: [],
            arrayEspecialidad: [],
            idServicio: 0,
            nombre: '',
            descripcion: '',
            precio: 0.0,
            especialidad: '',
            search: '',
            rows: [],
            buscado: false,
            classBtnGuardar: "btn btn-primary",
            classBtnModificar: "displayNone",
            BtnGuardar: "BtnGuardar",
            BtnModificar: "BtnModificar",
            servicio: {
                'id': 0,
               'nombre': '',
               'descripcion': '',
               'precio': 0
           }
        }
    },
    mounted(){
        this.getServicios();
        document.getElementById("bodyTabla").setAttribute("style","display: none");
    },
    methods:{
        closeModal(){
            this.showModal = false;
            this.classBtnGuardar = "btn btn-primary";
            this.classBtnModificar = "display: none";
        },
        tabla(){
            this.$nextTick(()=>{
                $('#tablaServicio').DataTable();
            });
        },
        getServicios(){
            axios.get('/listaServicios').then(function (res) {
                    this.arrayServicio = res.data;
                    this.tabla();
            }.bind(this));
        },
        filtrarServicios(){
                if(this.buscado == false){
                    this.getServicios();
                    document.getElementById("bodyTabla").removeAttribute("style");
                    this.buscado = true;
                }
                let me = this;
                let search= this.search;
                var i;
                if(search==''){
                    this.getServicios();
                    this.rows = this.arrayServicio;
                }else{
                    this.rows=[];
                    for (i=0; i<me.arrayServicio.length; i++){
                        var servicio = me.arrayServicio[i];
                        if(servicio.nombre.toLowerCase().indexOf(search) != -1 ||
                            servicio.descripcion.toLowerCase().indexOf(search) != -1 ||
                            servicio.precio.toString().indexOf(search) != -1 )
                                this.rows.push(servicio);
                    }
                }
                this.arrayServicio = this.rows;
        },
        modificar(id, nombre, descripcion, precio){
            this.idServicio= id;
            this.nombre = nombre;
            this.descripcion = descripcion;
            this.precio = precio;
            this.classBtnGuardar = "display: none";
            this.classBtnModificar = "btn btn-primary";
            this.showModal = true;
            document.getElementById("BtnGuardar").style.display= "none";
            document.getElementById("BtnModificar").style.display= "inline-block";
        },
        eliminar(idServ, index){
            if(confirm("Estas seguro de eliminar?")){
                axios.post('/request/eliminar-servicio/'+idServ
                ,{_method: 'delete'}).then((response) => {
                    if(response.data == "ExisteTransaccion"){
                        alert("No se puede eliminar, Existe una transaccion");
                    }else{
                        "Se elimino correctamente";
                        this.arrayServicio.splice(index, 1);
                    }
                }, (error) => {
                    console.log("Puede que el servicio haya sido utilizado previamente");
                    console.log(response);
                    // error callback
                })
            }
        },
        VerificarBaseDatos(){
            ///Verifica que los datos locales y la BD sean Iguales

            //var local = [...this.arrayServicio];
            var local = Array.from(this.arrayServicio);
            this.getServicios();

           // console.log("local");
            //console.log(local);
            //console.log("BD");
            //console.log(this.arrayServicio);
            if(JSON.stringify(local)==JSON.stringify(this.arrayServicio)){
                console.log("Tabla Integra");
                return true;
            }
            console.log("Tabla Distinta");
            alert("Posiblemente necesite actualizar su tabla con la BD");
            return false;

        },
        modificarTabla(){
           // console.log("primera vez q menciona servicio");
            this.servicio.id=this.idServicio;
           this.servicio.nombre=this.nombre;
           this.servicio.descripcion=this.descripcion;
           this.servicio.precio=this.precio;
           
            console.log("Se construyo el servicio");
           console.log(this.servicio);
           let local = this.arrayServicio;

           /*
           console.log(local);
           alert (local.findIndex(x => x.id === servicio.idServicio));
           */
          //console.log("Posicion");
           var posicion =local.findIndex(x => x.id === this.idServicio);
           //var original = JSON.parse(JSON.stringify(local[x]));
            //console.log(posicion);

            //console.log("///////////////////////");

           if(this.verificarTabla(local,this.servicio,posicion)){
               if(this.VerificarBaseDatos())
               {

                   axios.post('request/actualizar-servicio',{

                    'id': this.servicio.id,
                    'nombre': this.servicio.nombre,
                    'descripcion': this.servicio.descripcion,

                    }).then(function(error){
                        

                    }).catch(function(error){
                        console.log(error);
                    });

                    //console.log("Antes del if para actualizar el precio");
                        if(this.servicio.precio!=local[posicion].precio){
                            //console.log("Entro al if");
                            axios.post('request/actualizar-precio',{
                                'idServicio': this.servicio.id,
                                'precio': this.servicio.precio
                            }).then(function(error){
                                alert("Se modifico correctamente");
                            }).catch(function(error){
                                console.log(error);
                            });        
                        }
                   
               }

           }
          this.getServicios();

        },
        verificarTabla(listaServicios,servicio,posicion){
            ////Verifica si no existe repetido, osea es posible realizar el cambio.
            //console.log("Entrando a VeridicarTabla: 1 Servicio, 2 posicion");
           // console.log(servicio);
            //console.log(posicion);
            var i;
            for(i=0; i<listaServicios.length; i++){
                
                if(i!=posicion){
                //console.log("Antes del if donde entra servicio" + i);
                if(servicio.nombre==listaServicios[i].nombre || 
                    servicio.descripcion==listaServicios[i].descripcion){
                        console.log("Se encontro un elemento similar en:" + posicion);
                        alert("Posiblemente ya exista el servicio (nombre/descripcion)");
                        return false;
                    }
                }
            }
            console.log("Todo en orden, no se encontro alguno similar");
            return true;
        },
        showNuevo(){
            this.showModal = true;
            this.vaciarModal();
        },
        guardar(){
                let me = this;
                this.servicio.nombre=me.nombre;
                this.servicio.descripcion=me.descripcion;
                this.servicio.precio=me.precio;
                if(me.nombre =='' || me.descripcion =='' || me.precio=='')
                    alert("Debe Llenar el formulario");
                else if(this.verificarTabla(this.arrayServicio,this.servicio,-1))
                axios.post('request/nuevo-servicio',{
                    'nombre': this.nombre,
                    'descripcion': this.descripcion,
                    'precio': this.precio
                }).then(function(error){
                    me.getServicios();
                    alert("Se anhadio correctamente el servicio");
                }).catch(function(error){
                    console.log(error);
                });        
                this.closeModal();

        },
        vaciarModal(){
            this.id = 0;
            this.nombre = "";
            this.descripcion = "";
            this.precio = 0;
            this.classBtnGuardar = "btn btn-primary";
            //this.classBtnModificar = "display: none";
            
            document.getElementById("BtnGuardar").style.display = "inline-block";
            document.getElementById("BtnModificar").style.display= "none";

        }
    }
}
</script>
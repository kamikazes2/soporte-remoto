<template>
    <div class="login-login-page">
            <div class="login-form">
                <form @submit.prevent="loginCorrecto()" class="login-register-form" id="nuevaCuentaForm">
                    <input type="text" v-model="dni" placeholder="DNI"/>
                    <input type="text" v-model="nombre" placeholder="Nombre"/>
                    <input type="text" v-model="apellido" placeholder="Apellido"/>
                    <input type="date" v-model="fechaNacimiento" placeholder="Fecha de Nacimiento"/>
                    <input type="text" v-model="usuario" placeholder="usuario"/>
                    <input type="password" v-model="password" placeholder="Contraseña"/>
                    <button @click="signUp()" >crear</button>
                    <p class="message">Ya tienes una cuenta? <a href="#" @click="tengoCuenta()">Ingresar</a></p>
                </form>
                <form @submit.prevent="loginCorrecto()" class="login-login-form" id="ingresarForm">
                    <input type="text" v-model="usuario" placeholder="usuario"/>
                    <input type="password" v-model="password" placeholder="contraseña"/>
                    <button @click="login()">Ingresar</button>
                    <p class="message">No tienes una cuenta? <a href="#" @click="crearCuenta()">Crear cuenta</a></p>
                </form>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                dni: '',
                nombre: '',
                apellido: '',
                fechaNacimiento: '',
                usuario :'',
                idUsuario : '',
                tipoUsuario:'',
                password: ''
            }
        },
        methods:{
            login(){
                axios.post('/request/login',{
                    'usuario': this.usuario,
                    'password': this.password
                }).then((response) => {
                    console.log(response.data);
                    //this.idUsuario = response.data.userData.id;
                    //this.tipoUsuario = response.data.tipoUsuario;
                    window.location = '/';
                    }).catch(function(error){
                    console.log(error);
                });
            },
            loginCorrecto(){
                //window.location = '/';
            },
            crearCuenta(){
                document.getElementById("nuevaCuentaForm").style.display = "block";
                document.getElementById("ingresarForm").style.display = "none";
            },
            tengoCuenta(){
                document.getElementById("nuevaCuentaForm").style.display = "none";
                document.getElementById("ingresarForm").style.display = "block";
            },
            signUp(){
                axios.post('/request/new-cliente',{
                    'dni': this.dni,
                    'nombre': this.nombre,
                    'apellido': this.apellido,
                    'fechaNacimiento': this.fechaNacimiento,
                    'usuario': this.usuario,
                    'password': this.password
                }).then((response) => {
                    console.log(response.data);
                        if(response.data.error == true){
                            alert(response.data.message);
                        }else{
                            alert("creado correctamente");
                            window.location = '/';
                        }
                    }).catch(function(error){
                    console.log(error);
                });
            }
        },
    }
</script>

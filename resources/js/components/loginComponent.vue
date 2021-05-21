<template>
    <div class="login-login-page">
            <div class="login-form">
                <form class="login-register-form">
                <input type="text"  placeholder="name"/>
                <input type="password" placeholder="password"/>
                <input type="text" placeholder="email address"/>
                <button>crear</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form @submit.prevent="loginCorrecto()" class="login-login-form">
                <input type="text" v-model="usuario" placeholder="usuario"/>
                <input type="password" v-model="password" placeholder="contraseña"/>
                <button @click="login()">login</button>
                <p class="message">No tienes una cuenta? <a href="#">Crear cuenta</a></p>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                usuario :'',
                idUsuario : '',
                tipoUsuario:'',
                password: ''
            }
        },
        methods:{
            login(){
                axios.post('request/buscar-usuario',{
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
        },
    }
</script>

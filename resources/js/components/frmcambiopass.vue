<template>
    <div class="login-login-page">
            <div class="login-form">
                <h3>Se requiere cambio de contraseña</h3>
                <form @submit.prevent="cambiar()" class="login-login-form" id="ingresarForm">
                    <input requiered type="text" v-model="usuario" placeholder="Nuevo usuario"/>
                    <input requiered type="password" v-model="password" placeholder="Nueva contraseña"/>
                    <input requiered type="password" v-model="password2" placeholder="Repetir la contraseña"/>
                    <label id="passM" style="display:none; color:red;">Las contraseñas no coinciden</label>
                    <button>Cambiar</button>
                </form>
        </div>
    </div>
</template>


<script>
    export default {
        data(){
            return{
                usuario: '',
                password: '',
                password2: ''
            }
        },
        methods:{
            async cambiar(){
                var res;
                if(this.password != this.password2){
                    document.getElementById("passM").style.display = "block";
                    return;
                }else{
                    res = await this.enviar();
                }
                if(res.error){
                    alert(res.message);
                    return;
                }else{
                    alert("Se cambio satisfactoriamente");
                    window.location = '/';
                }
                
            },
            async enviar(){
                var r;
                await axios.post('/request/cambiar-pass-y-usuario',{
                    'usuario': this.usuario,
                    'password': this.password
                }).then((response) => {
                    r = response.data;
                    console.log(r);
                }).catch(function(error){
                    console.log(error);
                });
                return r;
            }
        },
    }
</script>
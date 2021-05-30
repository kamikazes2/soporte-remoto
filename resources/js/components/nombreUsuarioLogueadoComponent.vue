<template>
    <div id="nombreUsuario"><label>{{this.usuarioLogueado}}</label></div>
</template>

<script>
export default {
    data(){
        return{
            usuarioLogueado:''
        }
    },
    methods:{
        getUser(){
            axios.get('/request/get-logged-user').then(function (res) {
                    this.usuarioLogueado = res.data;
            }.bind(this));
        }
    },
    mounted() {
        this.getUser();
    },
}
</script>
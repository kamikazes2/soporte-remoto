deudas
<template>
    <div class="container">
        <table id="tablaServicio" class="table">
            <thead>
                <tr>
                    <th>Codigo Solicitud</th>
                    <th>Nombre Cliente</th>
                    <th>Nro Pago</th>
                    <th>Detalle</th>
                    <th>Monto</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="bodyTabla">
                <tr v-for="(solicitud, index) in arrayDeudas" :key="index">
                    <td>{{solicitud.idSolicitudServicio}}</td>
                    <td>{{solicitud.nombreCliente}}</td>
                    <td>{{solicitud.nroPago}}</td>
                    <td>{{solicitud.detalle}}</td>
                    <td>{{solicitud.monto}}</td>
                    <td>
                        <button style= "" @click="pagar(solicitud.idDetalle)" class="btn btn-danger custom_button">Pagar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>


<script>
import datatable from 'datatables.net-bs4'
export default {
    data(){
        return{
            arrayDeudas: []
        }
    },
    methods:{
        createTable(){
            this.$nextTick(()=>{
                $('#tablaServicio').DataTable();
            });
        },
        async getDeudas(){
            var i = false;
            await axios.get('/request/get-deudas-cliente').then(function(response){
                    if(response.data!=false){
                        this.arrayDeudas = response.data;
                    }else{
                        i = false;
                    }
            }.bind(this));
            return i;
        },
        async pagar(idDetalle){
            await axios.post('/request/pagar-deudas-cliente',{
                    'idDetalle' : idDetalle,
                }).then(async function(error){
                    alert("pagado correctamente");      
                }).catch(function(error){
                    console.log(error);
            }); 
        }
    },
    async mounted(){
        await this.getDeudas();
        this.createTable();
    }
}
</script>
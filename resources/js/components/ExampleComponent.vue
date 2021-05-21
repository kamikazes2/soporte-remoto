<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>

                    <div>
                        <bootstrap-4-datatable :columns="columns" :data="rows" :filter="filter" :per-page="perPage"></bootstrap-4-datatable>
                        <bootstrap-4-datatable-pager v-model="page" type="abbreviated"></bootstrap-4-datatable-pager>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        data() {
            return {
                name: 'HelloWorld',
                columns: [{
                        label: 'id',
                        field: 'id'
                    },
                    {
                        label: 'nombre',
                        field: 'nombre'
                    },
                    {
                        label: 'descripcion',
                        field: 'descripcion'
                    },
                    {
                        label: 'precio',
                        field: 'precio'
                    }
                ],
                rows: [],
                page: 1,
                filter:  '',
                perPage: 12,
            }
        },
        
        methods: {
        showBlogs: function () {
                axios.get('/listaServicios').then(function (res) {
                    this.rows = res.data;
                }.bind(this));
            },
        mounted() {
            console.log('Component mounted.')
        },
        },
        created: function () {
            this.showBlogs()
        }
    }
















    
</script>



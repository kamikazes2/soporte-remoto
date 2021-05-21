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
                        Filter by anything: <input v-model="search">
                        <button type="button" @click="filteredServicios()">Mostrar</button>
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
                search: '',
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
/*


<div id="tabledemo">
  <h3>Vue Datatable example</h3>
  Filter by anything: <input v-model="search">
  <hr>
  <data-table :users="filteredUsers"></data-table>
</div>


Vue.component("data-table", {
  template: "<table></table>",
  props: ["servicios"],
  data() {
    return {
      headers: [
        { title: "id" },
        { title: "nombre" },
        { title: "descripcion" },
        { title: "precio" }
      ],
      rows: [],
      dtHandle: null
    };
  },
  watch: {
    servicios(val, oldVal) {
      let vm = this;
      vm.rows = [];
      // You should _probably_ check that this is changed data... but we'll skip that for this example.
      val.forEach(function (item) {
        // Fish out the specific column data for each item in your data set and push it to the appropriate place.
        // Basically we're just building a multi-dimensional array here. If the data is _already_ in the right format you could
        // skip this loop...
        let row = [];

        row.push(item.id);
        row.push(item.nombre);
        row.push(item.descripcion);
        row.push(item.precio);

        vm.rows.push(row);
      });

      // Here's the magic to keeping the DataTable in sync.
      // It must be cleared, new rows added, then redrawn!
      vm.dtHandle.clear();
      vm.dtHandle.rows.add(vm.rows);
      vm.dtHandle.draw();
    }
  },
  mounted() {
    let vm = this;
    // Instantiate the datatable and store the reference to the instance in our dtHandle element.
    vm.dtHandle = $(this.$el).DataTable({
      // Specify whatever options you want, at a minimum these:
      columns: vm.headers,
      data: vm.rows,
      searching: false,
      paging: false,
      info: false
    });
  }
});

new Vue({
  el: "#tabledemo",
  data: {
    servicios: [],
    search: ""
  },
  computed: {
    filteredServicios: function () {
      let self = this;
      let search = self.search.toLowerCase();
      return self.servicios.filter(function (servicio) {
        return (
          servicio.nombre.toLowerCase().indexOf(search) !== -1 ||
          servicio.descripcion.toLowerCase().indexOf(search) !== -1 ||
          servicio.precio.indexOf(search) !== -1
        );
      });
    }
  },
  mounted() {
    let vm = this;

    axios.get('/listaServicios').then(function (res) {
                        vm.servicios = res.data;
                    }.bind(this));

  }
});

*/

    
</script>



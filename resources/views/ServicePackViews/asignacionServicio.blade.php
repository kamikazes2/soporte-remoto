@extends('ServicePackViews.layout')

@section('content')

<h1 style="text-align: center">Lista de Servicios en espera</h1>
<table class="table table-striped table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>fecha</th>
            <th>Servicios</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($solicitudServicio as $sol)
        <tr>
            <td>{{ $sol->id}}</td>
            <td>{{ $sol->idCliente }}</td>
            <td>{{ $sol->fechaSolicitud }}</td>
            <td>
                <ul>
                    @foreach ($sol->servicioRealizar as $sr)
                    <li> {{ $sr->nombre }}  </li>
                    @endforeach
                <ul>
            </td>
            <td>
            <button class="btn btn-success modalboton" data-toggle="modal" value="{{$sol->id}}" data-target="#exampleModal">Asignar</button>
            </td>
        </tr> 
        @endforeach
    </tbody>
</table>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Asignar Servicio a Tecnico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>


@endsection

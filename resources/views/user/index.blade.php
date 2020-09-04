@extends('layouts.argon')

@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Usuarios</h3>
          </div>
          <div class="col text-right">
            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Nuevo</a>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush" id="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Correo</th>
              <th scope="col">Creado</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody></tbody>
          <tfoot>
            <tr>
              <td></td>
              <td>
                <input type="text" class="form-control filter-input" placeholder="Buscar por nombre" data-column="1" />
              </td>
              <td>
                <input type="text" class="form-control filter-input" placeholder="Buscar por correo" data-column="2" />
              </td>
              <td></td>
              <td></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    var table = $('#table').DataTable({
      processing: true,
      serverSider: true,
      ajax: '{!! route('dataTableUser') !!}',
      columns: [
        {data: 'id'},
        {data: 'name'},
        {data: 'email'},
        {data: 'created_at'},
        {data: 'btn' },
      ],
      "columnDefs":[
      //  {
      //    "render": function(data, type, row){
      //      return data +' - '+row['email'];
      //    },
      //    "targets": 1
      //  },
        {
          "visible": false, "targets": [0]
        }
      ],
      "dom": 'lrtip',
      "language":{
          "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",
          "info": "_TOTAL_ Registros",
          "search": "Buscar",
          "paginate":{
              "next": "Siguiente",
              "previous": "Anterior"
          },
          "loadingRecords": "Cargando...",
          "processing": "Procesando",
          "emptyTable": "No hay registros",
          "zeroRecords": "Sin registros"
      }
    });
    $('.filter-input').keyup(function(){
      table.column($(this).data('column'))
      .search($(this).val())
      .draw();
    });
  });
  </script>
@endsection

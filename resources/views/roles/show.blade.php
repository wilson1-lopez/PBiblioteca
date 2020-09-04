@extends('layouts.argon')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="row align-items-center">
        <div class="col-8">
            <h3 class="mb-0">Detalle</h3>
        </div>
        <div class="col-4 text-right">
            <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-circle-left"></i> Volver</a>
        </div>
    </div>
  </div>
  <div class="card-body">
    <div class="mb-2">
      <table class="table table-bordered table-striped">
        <tbody>
          <tr>
            <th> Nombre </th>
            <td> {{ $role->nombre }} </td>
          </tr>
          <tr>
            <th> Slug </th>
            <td> {{ $role->slug }} </td>
          </tr>
          <tr>
            <th> Permisos </th>
            <td>
                @if ($role->permissions != null)
                    @foreach($role->permissions as $permission)
                        <span class="badge badge-info">{{$permission->nombre}}</span>
                    @endforeach
                @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

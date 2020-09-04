@extends('layouts.argon')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="row align-items-center">
        <div class="col-8">
            <h3 class="mb-0">Detalle</h3>
        </div>
        <div class="col-4 text-right">
            <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-circle-left"></i> Volver</a>
        </div>
    </div>
  </div>
  <div class="card-body">
    <div class="mb-2">
      <table class="table table-bordered table-striped">
        <tbody>
          <tr>
            <th> Nombre </th>
            <td> {{ $user->name }} </td>
          </tr>
          <tr>
            <th> Correo </th>
            <td> {{ $user->email }} </td>
          </tr>
          <tr>
            <th> Roles </th>
            <td>
                @if ($user->roles->isNotEmpty())
                    @foreach($user->roles as $role)
                        <span class="badge badge-info">{{$role->nombre}}</span>
                    @endforeach
                @else
                    <span class="badge badge-info">Sin Rol asignado</span>
                @endif
            </td>
          </tr>
          <tr>
              <th> Permisos </th>
              <td>
                  @if ($user->permissions->isNotEmpty())
                      @foreach($user->permissions as $permissions)
                          <span class="badge badge-info">{{$permissions->nombre}}</span>
                      @endforeach
                  @else
                      <span class="badge badge-info">Sin permisos asignados</span>
                  @endif
              </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

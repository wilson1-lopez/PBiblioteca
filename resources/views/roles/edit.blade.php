@extends('layouts.argon')

@section('content')
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Editar</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-circle-left"></i> Volver</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update', $roles->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nombre">Nombre</label>
                                        <input type="text" id="nombre" class="form-control" name="nombre" value="{{ $roles->nombre }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="slug">Slug</label>
                                        <input type="text" id="slug" name="slug" class="form-control" value="{{ $roles->slug }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Permisos</label>
                                        <input type="text"
                                               data-role="tagsinput"
                                               name="roles_permissions"
                                               value="@foreach ($roles->permissions as $permission){{ $permission->nombre.',' }}@endforeach"
                                               class="form-control"
                                               placeholder="Permisos">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-success"><i class="fas fa-save"></i> Actualizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('#nombre').keyup(function(e){
            var str = $('#nombre').val();
            str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
            $('#slug').val(str);
            $('#slug').attr('placeholder', str);
        });
    });
</script>
@endsection

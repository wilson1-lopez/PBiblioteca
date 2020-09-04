@extends('layouts.argon')

@section('content')
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Nuevo</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-circle-left"></i> Volver</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">Nombre</label>
                                        <input type="text" id="" class="form-control" name="name" placeholder="Enter your name" value="">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Correo</label>
                                        <input type="email" id="" name="email" class="form-control" placeholder="example@example.com">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="password">Contraseña</label>
                                        <input type="password" id="" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="password">Confirmar</label>
                                        <input type="password" id="" name="password_confirmation" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="role">Rol</label>
                                        <select name="role" class="form-control" id="role" required>
                                            <option value="">Seleccione un rol:</option>
                                            @foreach($roles as $role)
                                                <option data-role-id="{{$role->id}}"
                                                        data-role-slug="{{$role->slug}}"
                                                        value="{{$role->id}}">{{$role->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" id="permissions_box">
                                        <label class="form-control-label" for="permisos">Permisos</label>
                                        <div id="permissions_ckeckbox_list"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-success"><i class="fas fa-save"></i> Guardar</button>
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
            var permissions_box = $('#permissions_box');
            var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');
            permissions_box.hide();

            $('#role').on('change', function() {
                var role = $(this).find(':selected');
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');
                permissions_ckeckbox_list.empty();
                $.ajax({
                    url: "/user/create",
                    method: 'get',
                    dataType: 'json',
                    data: {
                        role_id: role_id,
                        role_slug: role_slug,
                    }
                }).done(function(data) {
                    permissions_box.show();
                    $.each(data, function(index, element){
                        $(permissions_ckeckbox_list).append(
                            '<div class="custom-control custom-checkbox">'+
                            '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+ element.slug +'" value="'+ element.id +'">' +
                            '<label class="custom-control-label" for="'+ element.slug +'">'+ element.nombre +'</label>'+
                            '</div>'
                        );
                    });
                });
            });
        });
    </script>
@endsection

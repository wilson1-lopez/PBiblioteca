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
                            <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-circle-left"></i> Volver</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">Name</label>
                                        <input type="text" id="" class="form-control" name="name" value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email address</label>
                                        <input type="email" id="" name="email" class="form-control" value="{{ $user->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="password">Password</label>
                                        <input type="password" id="" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="role">Rol</label>
                                        <select name="role" class="form-control" id="role" required>
                                            <option value="">Seleccione un rol:</option>
                                            @foreach($roles as $role)
                                                <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}" {{ $user->roles->isEmpty() || $role->nombre != $userRole->nombre ? "" : "selected"}}>{{$role->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" id="permissions_box">
                                        <label class="form-control-label" for="permisos">Permisos</label>
                                        <div id="permissions_ckeckbox_list"></div>
                                    </div>
                                    @if($user->permissions->isNotEmpty())
                                        @if($rolePermissions != null)
                                            <div id="user_permissions_box" >
                                                <label for="roles">User Permissions</label>
                                                <div id="user_permissions_ckeckbox_list">
                                                    @foreach ($rolePermissions as $permission)
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" name="permissions[]" id="{{$permission->slug}}" value="{{$permission->id}}" {{ in_array($permission->id, $userPermissions->pluck('id')->toArray() ) ? 'checked="checked"' : '' }}>
                                                            <label class="custom-control-label" for="{{$permission->slug}}">{{$permission->nombre}}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    @endif
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
            var permissions_box = $('#permissions_box');
            var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');
            var user_permissions_box = $('#user_permissions_box');
            var user_permissions_ckeckbox_list = $('#user_permissions_ckeckbox_list');
            permissions_box.hide(); // hide all boxes
            $('#role').on('change', function() {
                var role = $(this).find(':selected');
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');
                permissions_ckeckbox_list.empty();
                user_permissions_box.empty();
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

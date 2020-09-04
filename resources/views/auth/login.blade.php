@extends('layouts.login')

@section('content')
    <form role="form" action="{{ route('login') }}" class="submit-prevent" method="POST">
        @csrf
        <div class="form-group mb-3">
            <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input placeholder="Correo" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autofocus required>
                @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <a href="{{ route('password.request') }}" class="text-gray-dark"><small>Olvidaste tu contraseña?</small></a>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('register') }}" class="text-gray-dark"><small>Crear un cuenta</small></a>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary my-4 submit-prevent-btn"><i class="spinner fas fa-spinner fa-spin"></i> Entrar</button>
        </div>
    </form>

@endsection

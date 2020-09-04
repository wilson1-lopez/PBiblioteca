@extends('layouts.login')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('register') }}" class="submit-prevent">
         @csrf
         <div class="form-group row">
             <div class="col-md-12">
                 <input id="name" placeholder="Nombre" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                 @error('name')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                 @enderror
             </div>
         </div>
         <div class="form-group row">
             <div class="col-md-12">
                 <input id="email" type="email" placeholder="Correo" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                 @error('email')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                 @enderror
             </div>
         </div>

         <div class="form-group row">
             <div class="col-md-12">
                 <input id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                 @error('password')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                 @enderror
             </div>
         </div>

         <div class="form-group row">
             <div class="col-md-12">
                 <input id="password-confirm" placeholder="Confirmar Contraseña" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
             </div>
         </div>

         <div class="form-group row mb-0">
             <div class="col-md-6 offset-md-4">
                 <button type="submit" class="btn btn-primary submit-prevent-btn">
                     {{ __('Registrarse') }}
                 </button>
             </div>
         </div>
     </form>
@endsection

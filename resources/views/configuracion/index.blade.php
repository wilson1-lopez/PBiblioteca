@extends('layouts.argon')

@section('content')

<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Configuracion</h3>
          </div>
          <div class="col text-right">
            <a href="{{ route('configuracion.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Nuevo</a>
          
            </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

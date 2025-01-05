@extends('Layouts.App')

@section('title','Usuario - Laboratorio')

@section('page-title')
<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('app.home')}}">Inicio</a></li>
        <li class="breadcrumb-item active">Usuario</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
@endsection
@section('content')
@include('Modulos.Usuario.modal.formUser')
    <div class="card p-1 m-0">
        <div class="card-header p-1">
            <button id="btn-form-usuario" class="btn btn-outline-success btn-sm">Nuevo usuario <i class="bi bi-plus-circle"></i></button>
        </div>
        <div class="card-body p-1">
            
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('app/modules/usuario/user.js') }}?v={{rand()}}"></script>
@endpush
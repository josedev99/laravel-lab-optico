@extends('Layouts.App')

@section('title','Inventario - Laboratorio')

@section('page-title')
<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('app.home')}}">Inicio</a></li>
        <li class="breadcrumb-item active">Inventario</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
@endsection
@section('content')
@include('Modulos.Inventario.modal.nuevo_lente')
@include('Modulos.Inventario.modal.ing_stock_lente_term')
    <div class="card p-1 m-0">
        <div class="card-header p-1">
            <button id="btn_nuevo_lente" class="btn btn-outline-success btn-sm">Crear tabla <i class="bi bi-plus-circle"></i></button>
        </div>
        <div class="card-body p-1">
            <div class="card" id="tabs_lentes_term">
                
              </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('app/modules/inventario/lente_term.js') }}?v={{rand()}}"></script>
@endpush
@extends('Layouts.App')

@section('title','Lentes rotos - Laboratorio')

@section('page-title')
<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('app.home')}}">Inicio</a></li>
        <li class="breadcrumb-item active">Lentes rotos</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
@endsection
@section('content')
@include('Modulos.Inventario.modal.nuevo_lente_roto')
    <div class="card p-1 m-0">
        <div class="card-header p-1">
            <button id="btn_lente_roto" class="btn btn-outline-success btn-sm">Lente roto <i class="bi bi-plus-circle"></i></button>
        </div>
        <div class="card-body p-1">
          <div class="accordion accordion-flush" id="tabs_lentes_term">
          </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('app/modules/inventario/lentes_rotos.js') }}?v={{rand()}}"></script>
@endpush
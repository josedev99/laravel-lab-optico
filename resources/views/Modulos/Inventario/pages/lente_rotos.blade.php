@extends('Layouts.App')

@section('title', 'Lentes rotos - Laboratorio')

@section('page-title')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('app.home') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Lentes rotos</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
@section('content')
    @include('Modulos.Inventario.modal.nuevo_lente_roto')
    @include('Modulos.Inventario.modal.nueva_justify_lente_roto')
    <div class="card p-1 m-0">
        <div class="card-header p-1">
            <button id="btn_lente_roto" class="btn btn-outline-success btn-sm">Lente roto <i
                    class="bi bi-plus-circle"></i></button>
        </div>
        <div class="card-body p-1">
            <table id="dt-lentes-rotos" width="100%" style="text-align: center;text-align:center ; padding:20px;"
                data-order='[[ 0, "desc" ]]' class="table-hover table-striped">
                <thead style="color:white;min-height:10px;border-radius: 2px;" class="bg-dark">
                    <tr style="min-height:10px;border-radius: 3px;font-style: normal;font-size: 12px">
                        <th style="text-align:center">#</th>
                        <th style="text-align:center">Código</th>
                        <th style="text-align:center">Fecha</th>
                        <th style="text-align:center">Cantidad</th>
                        <th style="text-align:center">Especificaciones</th>
                        <th style="text-align:center">Justificación</th>
                        <th style="text-align:center">Categoria</th>
                        <th style="text-align:center">Realizado por</th>
                        <th style="text-align:center">Acciones</th>
                    </tr>
                </thead>
                <tbody style="font-size: 12px;"></tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('app/modules/inventario/lentes_rotos.js') }}?v={{ rand() }}"></script>
    <script src="{{ asset('app/modules/inventario/justify_lente_roto.js') }}?v={{ rand() }}"></script>
@endpush

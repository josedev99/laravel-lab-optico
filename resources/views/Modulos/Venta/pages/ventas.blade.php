@extends('Layouts.App')

@section('title','Ventas - Laboratorio')

@section('page-title')
<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('app.home')}}">Inicio</a></li>
        <li class="breadcrumb-item active">Ventas laboratorio</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
@endsection
@section('content')
    <div class="card p-1 m-0">
        <div class="card-header p-1">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="input-group mb-3">
                        <select class="form-select" name="cliente_venta" id="cliente_venta">
                            <option value="">Selecionar ciente</option>
                            <option value="1">Jose</option>
                        </select>
                        <span class="input-group-text" style="cursor: pointer"><i class="bi bi-person-fill-add"></i></span>
                      </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="input-group mb-3">
                        <select class="form-select" name="asesor_venta" id="asesor_venta">
                            <option value="">Selecc. Asesor</option>
                            <option value="{{ Auth()->user()->id }}">{{Auth()->user()->nombre}}</option>
                        </select>
                        <span class="input-group-text" style="cursor: pointer"><i class="bi bi-person-check"></i></span>
                      </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="input-group mb-3">
                        <select class="form-select" name="tipo_venta" id="tipo_venta">
                            <option value="">Selecc. Tipo venta</option>
                            <option value="Contado">Contado</option>
                            <option value="Credito">Credito</option>
                        </select>
                        <span class="input-group-text" style="cursor: pointer"><i class="bi bi-receipt"></i></span>
                      </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="input-group mb-3">
                        <select class="form-select" name="forma_pago" id="forma_pago">
                            <option value="">Selecc. Forma pago</option>
                        </select>
                        <span class="input-group-text" style="cursor: pointer"><i class="bi bi-cash-coin"></i></span>
                      </div>
                </div>

                <div class="col-sm-12 col-md-12">
                    <div class="input-group mb-3">
                        <select class="form-select" name="productos" id="productos">
                            <option value="">Selecc. Productos</option>
                        </select>
                        <span class="input-group-text" style="cursor: pointer"><i class="bi bi-cart-plus"></i></span>
                      </div>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <table style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descripcion</th>
                                <th>Cantidad</th>
                                <th>Precio unit</th>
                                <th>Descuento</th>
                                <th>Total</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Vision sencilla Term.</td>
                                <td>3</td>
                                <td><button class="btn btn-outline-succes">+</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('app/modules/venta/venta.js') }}?v={{rand()}}"></script>
@endpush
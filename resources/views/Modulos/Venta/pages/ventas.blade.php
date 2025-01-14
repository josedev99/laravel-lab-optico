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
                <div class="col-sm-12 col-md-12">
                    <div class="content-input">
                        <input type="text" name="nombre_lente" title="nombre" placeholder=" " class="input">
                        <label class="input-label">Cliente</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <select name="" id="" class="form-select">
                            <option value="">Vendedor</option>
                            <option value="">Cheque</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <select name="" id="" class="form-select">
                            <option value="">Seleccionar</option>
                            <option value="">Cheque</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <table style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Stock</th>
                                <th>Agregar</th>
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
    <script src="{{ asset('app/modules/inventario/lente_term.js') }}?v={{rand()}}"></script>
@endpush
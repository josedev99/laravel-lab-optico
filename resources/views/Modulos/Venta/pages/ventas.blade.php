@extends('Layouts.App')

@section('title', 'Ventas - Laboratorio')

@section('page-title')
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('app.home') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Ventas laboratorio</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
@section('content')
    <style>
        .tr-hover:hover {
            background: #ececec
        }
        .icon-btn{
            font-size: 18px !important;
            color: #4154f1 !important;
            background: #f6f6fe !important;
            height: 25px !important;
            width: 25px !important;
        }
    </style>
    @include('Modulos.Venta.modal.add_items_product')
    <div class="card p-1 m-0">
        <div class="card-header p-1">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="input-group mb-3">
                        <label for="" class="select-title">Óptica/cliente</label>
                        <select class="form-select" name="cliente_venta" id="cliente_venta">
                            <option value="">Seleccionar</option>
                            <option value="1">Carlos López</option>
                            <option value="2">María Pérez</option>
                            <option value="3">Luis Hernández</option>
                            <option value="4">Ana Martínez</option>
                            <option value="5">Juan Gómez</option>
                            <option value="6">Claudia Ramírez</option>
                            <option value="7">José Torres</option>
                            <option value="8">Sofía Vásquez</option>
                            <option value="9">Ricardo Castillo</option>
                            <option value="10">Gabriela Rivera</option>
                            <option value="11">Fernando Ruiz</option>
                            <option value="12">Diana Morales</option>
                            <option value="13">Carlos Castro</option>
                            <option value="14">Patricia López</option>
                            <option value="15">Jorge Melgar</option>
                            <option value="16">Valeria Ortiz</option>
                            <option value="17">Óscar Mejía</option>
                            <option value="18">Mónica Rivas</option>
                            <option value="19">Daniel López</option>
                            <option value="20">Camila Jiménez</option>
                            <option value="21">Héctor Rodríguez</option>
                            <option value="22">Laura Fuentes</option>
                            <option value="23">Raúl García</option>
                            <option value="24">Andrea Flores</option>
                            <option value="25">Francisco Luna</option>
                        </select>
                        <span class="select-icon" title="Agregar nuevo cliente" id="add-item-justify"
                            style="cursor: pointer"><i class="bi bi-plus-lg"></i></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="input-group mb-3">
                        <label for="" class="select-title">Asesor</label>
                        <select class="form-select" name="asesor_venta" id="asesor_venta">
                            <option value="">Selecc. Asesor</option>
                            <option value="{{ Auth()->user()->id }}">{{ Auth()->user()->nombre }}</option>
                        </select>
                        <span class="input-group-text" style="cursor: pointer"><i class="bi bi-person-check"></i></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2">
                    <div class="input-group">
                        <label for="" class="select-title">Tipo de venta</label>
                        <select class="form-select" name="tipo_venta" id="tipo_venta">
                            <option value="">Seleccionar</option>
                            <option value="1">Contado</option>
                            <option value="2">Credito</option>
                        </select>
                        <span class="input-group-text" style="cursor: pointer"><i class="bi bi-receipt"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="card p-1 m-0">
                <div class="card-header p-1">
                    <div class="d-flex justify-content-between">
                        <button id="btnAddProduct" class="btn btn-outline-info btn-sm d-flex justify-content-start align-items-center" style="border: none">
                            <div class="card-icon rounded-circle icon-btn d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart-plus"></i>
                            </div>
                            <div class="ps-1">
                                Agregar producto
                            </div>
                        </button>
                        <button class="btn btn-outline-success btn-sm"><i class="bi bi-bag-check"></i> Registrar
                        venta</button>
                    </div>
                </div>
                <div class="card-body p-1">
                    <table class="" style="width: 100%; font-size: 12px;border-collapse:collapse">
                        <thead class="bg-dark text-white text-center">
                            <tr>
                                <th style="padding: 4px;width: 5%">#</th>
                                <th style="padding: 4px;width: 60%">DESCRIPCIÓN</th>
                                <th style="padding: 4px;width: 5%">CANTIDAD</th>
                                <th style="padding: 4px;width: 10%">PRECIO UNIT</th>
                                <th style="padding: 4px;width: 10%">DESCUENTO</th>
                                <th style="padding: 4px;width: 5%">TOTAL</th>
                                <th style="padding: 4px;width: 5%">ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td style="width: 5%">1</td>
                                <td style="width: 60%">Vision sencilla Term.</td>
                                <td style="width: 5%"><b>3</b></td>
                                <td style="width: 10%">$20.00</td>
                                <td style="width: 10%">10%</td>
                                <td style="width: 5%"><b>$60.00</b></td>
                                <td style="width: 5%"><button type="button" class="btn btn-outline-danger btn-sm"
                                        style="border: none;"><i class="bi bi-x-circle"></i>
                                    </button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('app/modules/venta/venta.js') }}?v={{ rand() }}"></script>
@endpush

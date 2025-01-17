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
                            <option value="{{ Auth()->user()->id }}">{{ Auth()->user()->nombre }}</option>
                        </select>
                        <span class="input-group-text" style="cursor: pointer"><i class="bi bi-person-check"></i></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="input-group mb-3">
                        <select class="form-select" name="tipo_venta" id="tipo_venta">
                            <option value="">Seleccionar</option>
                            <option value="1">Contado</option>
                            <option value="2">Credito</option>
                            <option value="3">Otro</option>
                        </select>
                        <span class="input-group-text" style="cursor: pointer"><i class="bi bi-receipt"></i></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="input-group mb-3">
                        <select class="form-select" name="forma_pago" id="forma_pago">
                            <option value="">Selecc. Forma pago</option>
                            <option value="01">Billetes y monedas</option>
                            <option value="02">Tarjeta Débito</option>
                            <option value="03">Tarjeta Crédito</option>
                            <option value="04">Cheque</option>
                            <option value="05">Transferencia-Depósito Bancario</option>
                            <option value="08">Dinero electrónico</option>
                            <option value="09">Monedero electrónico</option>
                            <option value="11">Bitcoin</option>
                            <option value="12">Otras Criptomonedas</option>
                            <option value="13">Cuentas por pagar del receptor</option>
                            <option value="14">Giro bancario</option>
                            <option value="99">Otros (se debe indicar el medio de pago)</option>
                        </select>
                        <span class="input-group-text" style="cursor: pointer"><i class="bi bi-cash-coin"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="card p-1 m-0">
                <div class="card-header p-1">
                    <div class="col-sm-12 col-md-12">
                        <div class="input-group mb-3">
                            <input name="input_search_product" id="input_search_product" type="search" class="form-control form-control-sm">
                            <span class="input-group-text" style="cursor: pointer"><i class="bi bi-cart-plus"></i></span>
                            <div id="component_list_product" class="card m-0 p-1" style="position:absolute;top: 40px;width: 80%;font-size: 13px;">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-1">
                    <table class="table table-hover" style="width: 100%; font-size: 12px">
                        <thead class="table-dark text-white text-center">
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 60%">DESCRIPCIÓN</th>
                                <th style="width: 5%">CANTIDAD</th>
                                <th style="width: 10%">PRECIO UNIT</th>
                                <th style="width: 10%">DESCUENTO</th>
                                <th style="width: 5%">TOTAL</th>
                                <th style="width: 5%">ELIMINAR</th>
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
                                <td style="width: 5%"><button type="button" class="btn btn-outline-danger btn-sm" style="border: none;"><i class="bi bi-x-circle"></i>
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

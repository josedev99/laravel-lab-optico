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
    .tr-hover:hover{
        background: #ececec
    }
</style>
    <div class="card p-1 m-0">
        <div class="card-header p-1">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="input-group mb-2">
                        <label for="" class="select-title">Cliente</label>
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
                <div class="col-sm-12 col-md-4">
                    <div class="input-group mb-2">
                        <label for="" class="select-title">Paciente</label>
                        <select class="form-select" name="paciente_venta" id="paciente_venta">
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
                <div class="col-sm-12 col-md-4">
                    <div class="input-group mb-3">
                        <label for="" class="select-title">Asesor</label>
                        <select class="form-select" name="asesor_venta" id="asesor_venta">
                            <option value="">Selecc. Asesor</option>
                            <option value="{{ Auth()->user()->id }}">{{ Auth()->user()->nombre }}</option>
                        </select>
                        <span class="input-group-text" style="cursor: pointer"><i class="bi bi-person-check"></i></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="input-group mb-3">
                        <label for="" class="select-title">Tipo de venta</label>
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
                        <label class="select-title">Forma de pago</label>
                        <select class="form-select" name="forma_pago" id="forma_pago">
                            <option value="">Seleccionar</option>
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
                            <option value="99">Otros (indicar la forma de pago)</option>
                        </select>
                        <span class="input-group-text" style="cursor: pointer"><i class="bi bi-cash-coin"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="card p-1 m-0">
                <div class="card-header p-1">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="content-input">
                            <input type="text" title="marca lente" name="input_search_product" id="input_search_product"  placeholder=" " class="input">
                            <label class="input-label">Producto lente</label>
                            <span class="input-icon" style="cursor: pointer"><i class="bi bi-cart-plus"></i></span>
                            <div id="component_list_product" class="card m-0 p-1"
                                style="position:absolute;top: 40px;width: 100%;font-size: 13px;">

                            </div>
                        </div>
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
                <div class="card-footer p-1 d-flex justify-content-end">
                    <button class="btn btn-outline-success btn-sm"><i class="bi bi-bag-check"></i> Registrar venta</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('app/modules/venta/venta.js') }}?v={{ rand() }}"></script>
@endpush

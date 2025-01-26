<style>
    .mayus {
        text-transform: uppercase;
    }

    .selectize-input {
        border-bottom-left-radius: 5px !important;
        border-start-start-radius: 5px !important;
        box-shadow: none !important;
    }

    .selectize-input.focus {
        border: 2px solid #1a73e8;
    }
</style>
<div class="modal fade" id="modal-lente-roto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white px-2 py-1">
                <h1 class="modal-title" style="font-size: 14px !important;" id="title_modal_tabla">REPORTAR LENTE ROTO
                </h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-1">
                <form id="form-lente-roto" method="post">
                    <div class="card-header p-1 d-flex justify-content-center">
                        <div class="checkbox icheck-primary d-inline" style="margin-right: 15px;">
                            <input type="radio" name="checkOptions" value="Bodega" id="checkBodega" />
                            <label for="checkBodega">Daño en bodega</label>
                        </div>
                        <div class="checkbox icheck-info d-inline">
                            <input type="radio" name="checkOptions" value="Montaje" id="checkMontaje" />
                            <label for="checkMontaje">Daño en montaje</label>
                        </div>
                    </div>
                    <div class="card m-0 p-1">
                        <div class="card-header p-1">

                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-sm-12 col-md-4 col-lg-5">
                                    <div class="input-group mb-2">
                                        <select class="form-select" name="tipo_lente" id="tipo_lente">
                                            <option value="">Selecc. Tipo lente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-5">
                                    <div class="input-group mb-2">
                                        <select class="form-select" name="lente_especif" id="lente_especif">
                                            <option value="">Selecc. Esfera/Cilindro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-2">
                                    <div class="content-input mb-2">
                                        <input type="number" title="cantidad lente" name="cantidad_lente" placeholder=" "
                                            value="1" step="1" min="1" max="500" class="input">
                                        <label class="input-label">Cantidad</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-1">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <select class="form-select" name="justif" id="justif">
                                        <option value="">Selecc. Justificación</option>
                                        <option value="Defecto de Fabrica del AR">Defecto de Fabrica del AR</option>
                                        <option value="Defecto de Fabrica de Tratamiento Fotosensible">Defecto de
                                            Fabrica de Tratamiento Fotosensible</option>
                                        <option value="Daño al Ranurar">Daño al Ranurar</option>
                                        <option value="Astilladura en el ranurado al montar">Astilladura en el
                                            ranurado al montar</option>
                                        <option value="Daño al Biselar">Daño al Biselar</option>
                                        <option value="Rayas de Fabrica">Rayas de Fabrica</option>
                                        <option value="Rayas al procesar">Rayas al procesar</option>
                                        <option value="Corte muy pequeño">Corte muy pequeño</option>
                                        <option
                                            value="Astilladura por colocación a presión en metal que no trae tornillos">
                                            Astilladura por colocación a presión en metal que no trae tornillos
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="content-input">
                                    <input type="text" name="observaciones" title="observaciones" placeholder=" "
                                        class="input mayus">
                                    <label class="input-label">Observaciones</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-1 d-flex justify-content-end">
                        <button type="submit" id="btnSaveLenteRoto" class="btn btn-outline-success btn-sm"><i
                                class="bi bi-floppy2"></i> Registrar</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>


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
                    <div class="card m-0 p-1">
                        <div class="card-header p-1 d-flex justify-content-center">
                            <div class="checkbox icheck-primary d-inline" style="margin-right: 15px;">
                                <input type="radio" name="checkOptions" value="Bodega" id="checkBodega" />
                                <label for="checkBodega">Categoria bodega</label>
                            </div>
                            <div class="checkbox icheck-info d-inline">
                                <input type="radio" name="checkOptions" value="Montaje" id="checkMontaje" />
                                <label for="checkMontaje">Categoria montaje</label>
                            </div>
                        </div>
                        <div class="card-body px-1 py-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-5">
                                    <div class="input-group mb-3">
                                        <label for="" class="select-title">Nombre lente</label>
                                        <select class="form-select" name="tipo_lente" id="tipo_lente">
                                            <option value="">Selecc. Tipo lente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-5">
                                    <div class="input-group mb-3">
                                        <label for="" class="select-title">Esf/Cil</label>
                                        <select class="form-select" name="lente_especif" id="lente_especif">
                                            <option value="">Selecc. Esfera/Cilindro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-2">
                                    <div class="content-input mb-3">
                                        <input type="number" title="cantidad lente" name="cantidad_lente"
                                            placeholder=" " value="1" step="1" min="1" max="500"
                                            class="input">
                                        <label class="input-label">Cantidad</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group mb-2">
                                        <label for="" class="select-title">Justificación</label>
                                        <select class="form-select" name="justif" id="justif">
                                            <option value="">Selecc. Justificación</option>
                                        </select>
                                        <span class="select-icon" title="Agregar nuevas justificaciones" id="add-item-justify" style="cursor: pointer"><i
                                                class="bi bi-plus-lg"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="content-input mb-2">
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

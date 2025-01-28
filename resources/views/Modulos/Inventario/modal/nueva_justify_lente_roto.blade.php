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
<div class="modal fade" id="modal-justify-lente-roto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background: rgba(0, 0, 0, .2);">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white px-2 py-1">
                <h1 class="modal-title" style="font-size: 14px !important;" id="title_modal_tabla">AGREGAR NUEVA JUSTIFICACIÓN</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-1">
                <form id="form-justify-lente-roto" method="post">
                    <div class="card m-0 p-1">
                        <div class="card-header p-1 d-flex justify-content-center">
                            <div class="checkbox icheck-primary d-inline" style="margin-right: 15px;">
                                <input type="radio" name="checkCatLenteRoto" value="Bodega" id="addCheckBodega" />
                                <label for="addCheckBodega">Categoria: Bodega</label>
                            </div>
                            <div class="checkbox icheck-info d-inline">
                                <input type="radio" name="checkCatLenteRoto" value="Montaje" id="addCheckMontaje" />
                                <label for="addCheckMontaje">Categoria: Montaje</label>
                            </div>
                        </div>
                        <div class="card-body p-1">
                            <div class="col-sm-12 col-md-12">
                                <div class="content-input">
                                    <input type="text" name="justify_lente_roto" title="justificación" id="justify_lente_roto" placeholder=" "
                                        class="input">
                                    <label class="input-label">Justificación</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-1 d-flex justify-content-end">
                        <button type="submit" id="btnSaveJustify" class="btn btn-outline-success btn-sm"><i
                                class="bi bi-floppy2"></i> Registrar</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

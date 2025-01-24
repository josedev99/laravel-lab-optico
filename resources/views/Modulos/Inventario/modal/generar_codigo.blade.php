<div class="modal fade" id="modal-gen-codigo-lente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark text-white px-2 py-1">
          <h1 class="modal-title" style="font-size: 14px !important;">GENERAR CÓDIGO DE LENTE</h1>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-1">
            <form  id="form-gen-code-lente" method="post">
            <div class="card p-1 m-0">
                <div class="card-body p-1">
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-12 col-md-6">
                                <div class="content-input">
                                    <input type="text" title="código lente" name="new_code_lente" id="new_code_lente" placeholder=" " class="input p-icon">
                                    <label class="input-label">Código lente</label>
                                    <span class="input-icon" id="btnGenCodeAleatorio"><i class="bi bi-sort-numeric-up-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-1 d-flex justify-content-end">
                        <button type="submit" id="btnGenCode" class="btn btn-outline-info btn-sm"><i class="bi bi-floppy2"></i> Guardar</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  
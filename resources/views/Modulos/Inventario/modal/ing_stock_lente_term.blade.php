<div class="modal fade" id="modal-stock-lente-term" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-dark text-white px-2 py-1">
          <h1 class="modal-title" style="font-size: 14px !important;">INGRESAR STOCK LENTE TERMINADO</h1>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-1">
            <form  id="form-ing-lente-term" method="post">
            <div class="card p-1 m-0">
                <div class="card-body p-1">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="content-input">
                                    <input type="text" readonly title="código lente" name="codigo_lente_term" id="codigo_lente_term" placeholder=" " class="input icon">
                                    <label class="input-label">Código</label>
                                    <span id="btnGenNewCode" class="input-icon"><i class="bi bi-pencil-square text-info"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="content-input">
                                    <input type="text" title="marca lente" name="marca_lente_term" id="marca_lente_term" readonly placeholder=" " class="input">
                                    <label class="input-label">Marca</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="content-input">
                                    <input type="text" title="diseño lente" name="diseno_lente_term" readonly id="diseno_lente_term" placeholder=" " class="input">
                                    <label class="input-label">Diseño</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="content-input">
                                    <input type="text" readonly title="esfera" name="esfera_lente" id="esfera_lente" placeholder=" " class="input">
                                    <label class="input-label">Esfera</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="content-input">
                                    <input type="text" readonly title="cilindro" name="cilindro_lente" id="cilindro_lente" placeholder=" " class="input">
                                    <label class="input-label">Cilindro</label>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="content-input">
                                    <input type="number" title="cantidad lente" name="cantidad_lente_term" placeholder=" " value="1" step="1" max="500" class="input">
                                    <label class="input-label">Cantidad</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="content-input">
                                    <input type="number" title="precio de costo" name="precio_costo_term" id="precio_costo_term" placeholder=" " step=".01" class="input">
                                    <label class="input-label">Precio de costo</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="content-input">
                                    <input type="number" title="precio de venta" name="precio_venta_term" id="precio_venta_term" placeholder=" " step=".01" class="input">
                                    <label class="input-label">Precio de venta</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-1 d-flex justify-content-end">
                        <button type="submit" id="btnSaveStockLenteTerms" class="btn btn-secondary btn-sm"><i class="bi bi-floppy2"></i> Registrar</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  
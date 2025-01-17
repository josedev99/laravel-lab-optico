<style>
    .mayus{
        text-transform: uppercase;
    }
</style>
<div class="modal fade" id="modal-nuevo-lente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-dark text-white px-2 py-1">
          <h1 class="modal-title" style="font-size: 14px !important;">REGISTRAR TABLA DE TERMINADOS</h1>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-1">
            <form  id="form-lente-term" method="post">
            <div class="card p-1 m-0">
                <div class="card-body p-1">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="content-input">
                                    <input type="text" name="nombre_lente" title="nombre" placeholder=" " class="input mayus">
                                    <label class="input-label">Nombre</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="content-input">
                                    <input type="text" name="marca_lente" title="marca" placeholder=" " class="input mayus">
                                    <label class="input-label">Marca</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="content-input">
                                    <input type="text" name="diseno_lente" title="diseño" placeholder=" " class="input mayus">
                                    <label class="input-label">Diseño</label>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="card m-0 p-1">
                                    <div class="card-header p-0 text-center" style="font-size: 13px;font-weight: 700;">
                                        <label for="">Esferas</label>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="content-input">
                                                    <input type="text" name="esf_desde" title="esfera desde" placeholder=" " class="input">
                                                    <label class="input-label">Desde (min)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="content-input">
                                                    <input type="text" name="esf_hasta" title="esfera hasta" placeholder=" " class="input">
                                                    <label class="input-label">Hasta (max)</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="card m-0 p-1">
                                    <div class="card-header p-0 text-center" style="font-size: 13px;font-weight: 700;">
                                        <label for="">Cilindros</label>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="content-input">
                                                    <input type="text" name="cil_desde" title="cilindro desde" placeholder=" " class="input">
                                                    <label class="input-label">Desde (min)</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="content-input">
                                                    <input type="text" name="cil_hasta" title="cilindro hasta" placeholder=" " class="input">
                                                    <label class="input-label">Hasta (max)</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-1 d-flex justify-content-end">
                        <button type="submit" class="btn btn-secondary btn-sm">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  
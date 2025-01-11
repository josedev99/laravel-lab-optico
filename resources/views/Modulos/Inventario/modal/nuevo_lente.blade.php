<style>
    .content-input{
        width: auto;
        margin: 8px 0px;

        display: grid;
        grid-template-areas: "input"
    }
    .input{
        grid-area: input;
        width: 100%;
        border-radius: 6px;
        border: 1px solid #9e9e9e;
        padding: .6rem 1.4rem;
        outline: none;
    }
    .input:focus-visible{
        border: 2px solid #26a69a;
    }
    .input-label{
        grid-area: input;
        z-index: 100;
        width: max-content;
        align-self: center;
        display: flex;
        align-items: center;
        color: #a2a2a2;
        font-size: 14px;
        margin-left: 15px;
        transition: transform .2s;
        transform: center left;
        pointer-events:none;

    }

    .input:where(:focus,
    :not(:placeholder-shown)) + .input-label{
        transform: translateY(-100%) translateX(-10%) scale(.9);
        background-color: #fff;
    }

</style>
<div class="modal fade" id="modal-nuevo-lente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-dark text-white px-2 py-1">
          <h1 class="modal-title" style="font-size: 14px !important;">REGISTRAR LENTER TERMINADO</h1>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-1">
            <form  id="form-lente-term" method="post">
            <div class="card p-1 m-0">
                <div class="card-body p-1">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="content-input">
                                    <input type="text" name="nombre_lente" placeholder=" " class="input">
                                    <label class="input-label">Nombre</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="content-input">
                                    <input type="text" name="marca_lente" placeholder=" " class="input">
                                    <label class="input-label">Marca</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="content-input">
                                    <input type="text" name="diseno_lente" placeholder=" " class="input">
                                    <label class="input-label">Diseño</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="content-input">
                                    <input type="text" name="esf_desde" placeholder=" " class="input">
                                    <label class="input-label">Esfera desde</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="content-input">
                                    <input type="text" name="cil_desde" placeholder=" " class="input">
                                    <label class="input-label">Cilindro desde</label>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="content-input">
                                    <input type="text" name="esf_hasta" placeholder=" " class="input">
                                    <label class="input-label">Esfera hasta</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="content-input">
                                    <input type="text" name="cil_hasta" placeholder=" " class="input">
                                    <label class="input-label">Cilindro hasta</label>
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
  
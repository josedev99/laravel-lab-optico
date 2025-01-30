<div class="modal fade" id="modal-add-items-prodict" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white px-2 py-1">
                <h1 class="modal-title" style="font-size: 14px !important;">AGREGAR PRODUCTOS A LA VENTA</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-1">
                <form id="form-add-product-venta" method="post">
                    <div class="card p-1 m-0">
                        <div class="card-header p-1">
                            <div class="row">
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
                            </div>
                        </div>
                        <div class="card-body p-1">
                            <div class="accordion accordion-flush">
                                <div class="accordion-item" style="box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);border-radius: 6px;margin-bottom: 4px;">
                                    <h2 class="accordion-header d-flex justify-content-center align-items-center" id="${bordered_tab}" style="padding:2px 15px;border-bottom: 1px solid #ebeef4;">
                                        <i onclick="editTableTerms(this)" data-id="${element.id}" class="bi bi-pencil-square text-info" title="Editar tabla" style="font-size: 18px;margin-right: 2px;cursor:pointer"></i>
                                        <button onclick="setActivePanel(this)" data-tabla_id="${element.id}" id="${accordion_btn}" data-accordion_body_id="${element_tab}" class="accordion-button collapsed p-2" type="button" data-bs-toggle="collapse" data-bs-target="#${element_tab}" aria-expanded="false" aria-controls="${element_tab}" style="font-size: 14px;font-weight: 600;">
                                        Marca
                                        </button>
                                        </h2>
                                        <div id="${element_tab}" class="accordion-collapse collapse" aria-labelledby="${bordered_tab}" data-bs-parent="#tabs_lentes_term">
                                            <div class="accordion-body" id="${accordionBodyId}" style="padding:2px 15px">
                                                tabla Lente
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

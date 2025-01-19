document.addEventListener('DOMContentLoaded', async(e) => {
    try {
        getLentesTerminados();

        let btn_nuevo_lente = document.getElementById('btn_nuevo_lente');
        if (btn_nuevo_lente) {
            btn_nuevo_lente.addEventListener('click', () => {
                document.getElementById('form-lente-term').reset(); //reset form
                $("#modal-nuevo-lente").modal('show');
                document.getElementById('btnSaveNewTabla').innerHTML = `<i class="bi bi-floppy2"></i> Registrar`;
                document.getElementById('title_modal_tabla').textContent = 'NUEVA TABLA DE TERMINADOS';
                //destroy tabla_id
                sessionStorage.removeItem('tabla_id');
            })
        }
        //processing form
        const FormLenteTerm = document.getElementById('form-lente-term');
        if (FormLenteTerm) {
            FormLenteTerm.addEventListener('submit', async(e) => {
                e.preventDefault();
                let form_data = new FormData(FormLenteTerm);
                (sessionStorage.getItem('tabla_id') !== null) ? form_data.append('tabla_id', sessionStorage.getItem('tabla_id')): false;
                //validaciones
                for ([key, value] of form_data.entries()) {
                    let input = document.querySelector(`input[name="${key}"]`);
                    console.log(/^id$/.test(key));
                    if (value.trim() === '' && !/^id$/.test(key)) {
                        input.classList.add('input-error');
                        Swal.fire({
                            title: "Aviso",
                            text: `El campo ${input.title} es obligatorio.`,
                            icon: "warning"
                        });
                        return;
                    } else {
                        input.classList.remove('input-error');
                    }
                }
                let btnSaveNewTabla = document.getElementById('btnSaveNewTabla');
                btnSaveNewTabla.disabled = true;

                axios.post(route('lente.term.save'), form_data)
                    .then((response) => {
                        if (response.status === 200) {
                            if (response.data.status === 'success') {
                                getLentesTerminados();
                                $("#modal-nuevo-lente").modal('hide')
                                FormLenteTerm.reset();
                                Swal.fire({
                                    title: "Éxito",
                                    text: "Se ha registrado exitosamente el inventario.",
                                    icon: "success"
                                });
                            } else {
                                Swal.fire({
                                    title: "Aviso",
                                    text: "Ha ocurrido un error al registrar el inventario.",
                                    icon: "warning"
                                });
                            }
                        } else {
                            console.log(response)
                            Swal.fire({
                                title: "Error",
                                text: "Ha ocurrido un error inesperado.",
                                icon: "error"
                            });
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                        Swal.fire({
                            title: "Error",
                            text: "Ha ocurrido un error inesperado.",
                            icon: "error"
                        });
                    })
                    .finally(() => {
                        resetValidError();
                        btnSaveNewTabla.disabled = false;
                    })
            })
        }
        //Procesar ingreso de lente terminado
        let formIngLenteTerm = document.getElementById("form-ing-lente-term");
        if (formIngLenteTerm) {
            formIngLenteTerm.addEventListener('submit', async(e) => {
                e.preventDefault();
                let formData = new FormData(formIngLenteTerm);
                //validaciones
                for ([key, value] of formData.entries()) {
                    let input = document.querySelector(`input[name="${key}"]`);
                    if (value.trim() === '') {
                        input.classList.add('input-error');
                        Swal.fire({
                            title: "Aviso",
                            text: `El campo ${input.title} es obligatorio.`,
                            icon: "warning"
                        });
                        return;
                    } else {
                        input.classList.remove('input-error');
                    }
                }
                formData.append('lente_term_id', sessionStorage.getItem('lente_term_id'));
                let btnSaveStockLenteTerms = document.getElementById('btnSaveStockLenteTerms');
                btnSaveStockLenteTerms.disabled = true;
                axios.post(route('lente.term.ingreso'), formData)
                    .then((response) => {
                        if (response.data.status === 'success') {
                            getLentesTerminados();
                            $("#modal-stock-lente-term").modal('hide');
                            formIngLenteTerm.reset();
                            Swal.fire({
                                title: "Éxito",
                                text: response.data.message,
                                icon: "success"
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: response.data.message,
                                icon: "error"
                            });
                        }
                    })
                    .catch((err) => {
                        Swal.fire({
                            title: "Error",
                            text: 'Ha ocurrido un error inesperado.',
                            icon: "error"
                        });
                        console.log(err);
                    })
                    .finally(() => {
                        btnSaveStockLenteTerms.disabled = false;
                    })

            })
        }
    } catch (err) {
        console.log(err)
    }
})

async function getLentesTerminados() {
    let response = await axios.post(route('lente.term.getAll'));
    createTabLenteTerminados(response.data);
}

function createTabLenteTerminados(data) {
    let tabs_lentes_term = document.getElementById('tabs_lentes_term');
    if (tabs_lentes_term) {
        tabs_lentes_term.innerHTML = '';

        data.forEach((element) => {
            let element_tab = 'flush-collapse-' + element.id;
            let bordered_tab = 'flush-heading-' + element.id;
            let accordionBodyId = 'accordionBody-' + element.id;
            let accordion_btn = 'accordion-button-' + element.id;

            let accordionItem = document.createElement('div');
            accordionItem.classList.add('accordion-item');
            accordionItem.style.boxShadow = '0px 0px 4px rgba(0, 0, 0, 0.1)';
            accordionItem.style.padding = '2px 15px';
            accordionItem.style.borderRadius = '6px';
            accordionItem.style.marginBottom = '4px';

            accordionItem.innerHTML = `
                <h2 class="accordion-header d-flex justify-content-center align-items-center" id="${bordered_tab}">
                <i onclick="editTableTerms(this)" data-id="${element.id}" class="bi bi-pencil-square text-info" title="Editar tabla" style="font-size: 18px;margin-right: 2px;cursor:pointer"></i>
                <button onclick="setActivePanel(this)" id="${accordion_btn}" data-accordion_body_id="${element_tab}" class="accordion-button collapsed p-2" type="button" data-bs-toggle="collapse" data-bs-target="#${element_tab}" aria-expanded="false" aria-controls="${element_tab}" style="font-size: 14px;font-weight: 600;">
                ${element.nombre} ${element.marca} ${element.diseno}
                </button>
                </h2>
                <div id="${element_tab}" class="accordion-collapse collapse" aria-labelledby="${bordered_tab}" data-bs-parent="#tabs_lentes_term">
                    <div class="accordion-body" id="${accordionBodyId}"></div>
                </div>
            `;

            // Rango de esferas y cilindros
            let esf_desde = parseFloat(element.esf_desde);
            let esf_hasta = parseFloat(element.esf_hasta);
            let cil_desde = parseFloat(element.cil_desde);
            let cil_hasta = parseFloat(element.cil_hasta);

            let tableHTML = `
                    <table style="width:100%;border-collapse: collapse;text-align:center;font-size: 13px">
                        <thead style="background:#4a494f;color: #ffffff">
                            <tr>
                                <th style="border: 1px solid rgb(155, 148, 148);width:5%">Esf/Cil</th>
            `;

            // Generar columnas de cilindros
            for (let cil = cil_hasta; cil_desde <= cil; cil -= 0.25) {
                let val_cil = (parseFloat(cil) > 0) ? '+' + cil.toFixed(2) : cil.toFixed(2);
                tableHTML += `<th style="border: 1px solid rgb(155, 148, 148)">${val_cil}</th>`;
            }

            tableHTML += `  </tr>
                        </thead>
                        <tbody>`;

            // Generar filas de esferas
            for (let esf = esf_hasta; esf >= esf_desde; esf -= 0.25) {
                let val_esf = (parseFloat(esf) > 0) ? '+' + esf.toFixed(2) : esf.toFixed(2);

                for (let cil = cil_hasta; cil_desde <= cil; cil -= 0.25) {
                    let val_cil = (parseFloat(cil) > 0) ? '+' + cil.toFixed(2) : cil.toFixed(2);

                    if (parseFloat(val_cil) === 0) {
                        tableHTML += `<tr><th style="border: 1px solid rgb(155, 148, 148);background:#4a494f;color: #ffffff">${val_esf}</th>`;
                    }
                    let stocks = element.stocks;
                    let searchLenteTerm = stocks.find((stock) => parseFloat(stock.esfera) === parseFloat(val_esf) && parseFloat(stock.cilindro) === parseFloat(val_cil));
                    let stock_actual = 0;
                    let codigo = '';
                    let precio_costo = '';
                    let precio_venta = '';
                    if (searchLenteTerm) {
                        codigo = searchLenteTerm.codigo;
                        precio_costo = parseFloat(searchLenteTerm.precio_costo).toFixed(2);
                        precio_venta = parseFloat(searchLenteTerm.precio_venta).toFixed(2);
                        stock_actual = parseInt(searchLenteTerm.stock);
                    }
                    tableHTML += `<td onclick="addLenteTerm(this)" data-id="${element.id}" data-codigo="${codigo}" data-precio_costo="${precio_costo}" data-precio_venta="${precio_venta}" data-marca="${element.marca}" data-diseno="${element.diseno}" data-nombre="${element.nombre}" data-esfera="${val_esf}" data-cilindro="${val_cil}" style="border: 1px solid rgb(155, 148, 148)">${stock_actual}</td>`;

                    if (parseFloat(val_cil) === parseFloat(cil_desde)) {
                        tableHTML += `</tr>`;
                    }
                }
            }

            tableHTML += `
                    </tbody>
                </table>
            `;

            let accordionBody = accordionItem.querySelector(`#${accordionBodyId}`);
            accordionBody.innerHTML = tableHTML;
            tabs_lentes_term.appendChild(accordionItem);
        });
        setTimeout(() => {
            activeTabPanel();
        }, 100);
    }
}

function addLenteTerm(cell) {
    let { id, marca, diseno, nombre, esfera, cilindro, codigo, precio_costo, precio_venta } = cell.dataset;
    document.getElementById('codigo_lente_term').value = codigo;
    document.getElementById('marca_lente_term').value = marca;
    document.getElementById('diseno_lente_term').value = diseno;
    sessionStorage.setItem('lente_term_id', id);
    document.getElementById('esfera_lente').value = esfera;
    document.getElementById('cilindro_lente').value = cilindro;
    document.getElementById('precio_costo_term').value = precio_costo;
    document.getElementById('precio_venta_term').value = precio_venta;

    //reset form
    resetValidError();
    $("#modal-stock-lente-term").modal('show');
}

function resetValidError() {
    let inputs = document.querySelectorAll('.input');
    inputs.forEach((input) => {
        if (input.classList.contains('input-error')) {
            input.classList.remove('input-error')
        }
    });
}

function setActivePanel(element) {
    sessionStorage.setItem('button_accordion', element.id);
    sessionStorage.setItem('accordion_body', element.dataset.accordion_body_id);

    sessionStorage.setItem('aria-expanded', element.getAttribute('aria-expanded'));
}

function activeTabPanel() {
    let button_accordion = sessionStorage.getItem('button_accordion');
    let accordion_body = sessionStorage.getItem('accordion_body');
    let ariaExpanded = sessionStorage.getItem('aria-expanded');
    if (ariaExpanded === "true") {
        document.querySelector(`#${button_accordion}`).classList.remove('collapsed');
        document.querySelector(`#${button_accordion}`).setAttribute('aria-expanded', ariaExpanded);
        document.querySelector(`#${accordion_body}`).classList.add('show');
    } else {
        document.querySelector(`#${button_accordion}`).classList.add('collapsed');
        document.querySelector(`#${button_accordion}`).setAttribute('aria-expanded', ariaExpanded);
        document.querySelector(`#${accordion_body}`).classList.remove('show');
    }
}

function editTableTerms(element) {
    let id = element.dataset.id;
    axios.post(route('table.obtener'), { id })
        .then((response) => {
            let { result, status, message } = response.data;
            console.log(result);
            if (status === 'success') {
                setDataInputs(result);
                //save tabla_id;
                sessionStorage.setItem('tabla_id', id); //params id
            } else {
                Swal.fire({
                    title: "Error",
                    text: message,
                    icon: "error"
                });
            }
        })
        .catch((err) => {
            console.log(err);
            Swal.fire({
                title: "Error",
                text: 'Ha ocurrido un error inesperado.',
                icon: "error"
            });
        })
        .finally(() => {

        })
    $("#modal-nuevo-lente").modal('show');
}

function setDataInputs(data) {
    document.getElementById('form-lente-term').reset(); //reset form

    document.querySelector('input[name="nombre_lente"]').value = data.nombre;
    document.querySelector('input[name="marca_lente"]').value = data.marca;
    document.querySelector('input[name="diseno_lente"]').value = data.diseno;
    document.querySelector('input[name="esf_desde"]').value = data.esf_desde;
    document.querySelector('input[name="esf_hasta"]').value = data.esf_hasta;
    document.querySelector('input[name="cil_desde"]').value = data.cil_desde;
    document.querySelector('input[name="cil_hasta"]').value = data.cil_hasta;
    //button form
    document.getElementById('btnSaveNewTabla').innerHTML = `<i class="bi bi-floppy2"></i> Actualizar`;
    document.getElementById('title_modal_tabla').textContent = 'ACTUALIZAR TABLA DE TERMINADOS';
}
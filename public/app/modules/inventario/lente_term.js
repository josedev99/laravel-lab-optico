document.addEventListener('DOMContentLoaded', async(e) => {
    try {
        getLentesTerminados();

        let btn_nuevo_lente = document.getElementById('btn_nuevo_lente');
        if (btn_nuevo_lente) {
            btn_nuevo_lente.addEventListener('click', () => {
                $("#modal-nuevo-lente").modal('show')
            })
        }
        //processing form
        const FormLenteTerm = document.getElementById('form-lente-term');
        if (FormLenteTerm) {
            FormLenteTerm.addEventListener('submit', async(e) => {
                e.preventDefault();
                let form_data = new FormData(FormLenteTerm);
                //validaciones
                for ([key, value] of form_data.entries()) {
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
                let response = await axios.post(route('lente.term.save'), form_data);
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
                let response = await axios.post(route('lente.term.ingreso'), formData);
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
        let cardBody = document.createElement('div');
        cardBody.classList.add('card-body', 'p-1');
        let ul = document.createElement('ul');

        ul.classList.add('nav', 'nav-tabs', 'nav-tabs-bordered');
        ul.setAttribute('role', 'tablist');

        data.forEach((element) => {
            let element_tab = 'tab-' + element.id;
            let bordered_tab = 'bordered-' + element.id;

            // Crear pestaña
            ul.innerHTML += `
                <li class="nav-item" role="presentation">
                    <button class="nav-link" onclick="setActivePanel(this)" id="${element_tab}" data-bs-toggle="tab" data-bs-target="#${bordered_tab}" type="button" role="tab" aria-controls="${bordered_tab}" data-keyElement="${bordered_tab}" aria-selected="false">${element.nombre}</button>
                </li>
            `;
        });

        cardBody.appendChild(ul);

        data.forEach((element) => {
            let element_tab = 'tab-' + element.id;
            let bordered_tab = 'bordered-' + element.id;

            // Rango de esferas y cilindros
            let esf_desde = parseFloat(element.esf_desde);
            let esf_hasta = parseFloat(element.esf_hasta);
            let cil_desde = parseFloat(element.cil_desde);
            let cil_hasta = parseFloat(element.cil_hasta);

            // Crear contenido de la pestaña
            let tab_content = document.createElement('div');
            tab_content.classList.add('tab-content', 'pt-2');

            let tableHTML = `
                <div class="tab-pane fade" id="${bordered_tab}" role="tabpanel" aria-labelledby="${element_tab}">
                    <table style="width:100%;border-collapse: collapse;text-align:center;font-size: 13px">
                        <thead>
                            <tr>
                                <th style="border: 1px solid rgb(155, 148, 148)">Esf/Cil</th>
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

                    if (parseFloat(val_cil) == 0) {
                        tableHTML += `<tr><th style="border: 1px solid rgb(155, 148, 148)">${val_esf}</th>`;
                    }
                    let stocks = element.stocks;
                    let searchLenteTerm = stocks.find((stock) => parseFloat(stock.esfera) === parseFloat(val_esf) && parseFloat(stock.cilindro) === parseFloat(val_cil));
                    let stock_actual = 0;
                    let codigo = '';
                    if (searchLenteTerm) {
                        codigo = searchLenteTerm.codigo;
                        stock_actual = parseInt(searchLenteTerm.stock);
                    }
                    tableHTML += `<td onclick="addLenteTerm(this)" data-id="${element.id}" data-codigo="${codigo}" data-marca="${element.marca}" data-diseno="${element.diseno}" data-nombre="${element.nombre}" data-esfera="${val_esf}" data-cilindro="${val_cil}" style="border: 1px solid rgb(155, 148, 148)">${stock_actual}</td>`;

                    if (parseFloat(val_cil) === parseFloat(cil_desde)) {
                        tableHTML += `</tr>`;
                    }
                }
            }

            tableHTML += `
                        </tbody>
                    </table>
                </div>
            `;

            tab_content.innerHTML += tableHTML;
            cardBody.appendChild(tab_content);
        });
        tabs_lentes_term.appendChild(cardBody);
        activeTabPanel();
    }
}

function addLenteTerm(cell) {
    let { id, marca, diseno, nombre, esfera, cilindro, codigo } = cell.dataset;
    document.getElementById('codigo_lente_term').value = codigo;
    document.getElementById('marca_lente_term').value = marca;
    document.getElementById('diseno_lente_term').value = diseno;
    sessionStorage.setItem('lente_term_id', id);
    document.getElementById('esfera_lente').value = esfera;
    document.getElementById('cilindro_lente').value = cilindro;

    $("#modal-stock-lente-term").modal('show');
}

function setActivePanel(element) {
    let keyElement = element.dataset.keyelement;
    sessionStorage.setItem('btn_tab_panel_id', element.id);
    sessionStorage.setItem('keyElemetTabPanel', keyElement);
}

function activeTabPanel() {
    let keyElemetTabPanel = sessionStorage.getItem('keyElemetTabPanel');
    let btn_tab_panel_id = sessionStorage.getItem('btn_tab_panel_id');

    document.querySelector(`#${keyElemetTabPanel}`).classList.add('active', 'show');
    document.querySelector(`#${btn_tab_panel_id}`).classList.add('active');
    document.querySelector(`#${btn_tab_panel_id}`).setAttribute('aria-selected', true);
}
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
                let response = await axios.post(route('lente.term.save'), form_data);
                if (response.status === 200) {
                    if (response.data.status === 'success') {
                        $("#modal-nuevo-lente").modal('hide')
                    } else {

                    }
                }
                console.log(response);
            })
        }
        //Procesar ingreso de lente terminado
        let formIngLenteTerm = document.getElementById("form-ing-lente-term");
        if (formIngLenteTerm) {
            formIngLenteTerm.addEventListener('submit', async(e) => {
                e.preventDefault();
                let formData = new FormData(formIngLenteTerm);
                formData.append('lente_term_id', sessionStorage.getItem('lente_term_id'));
                let response = await axios.post(route('lente.term.ingreso'), formData);
                if (response.data.status === 'success') {
                    $("#modal-stock-lente-term").modal('hide');
                } else {

                }
                console.log(response);
            })
        }
    } catch (err) {
        console.log(err)
    }
})

async function getLentesTerminados() {
    let response = await axios.post(route('lente.term.getAll'));
    createTabLenteTerminados(response.data);
    console.log(response);
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
                    <button class="nav-link" id="${element_tab}" data-bs-toggle="tab" data-bs-target="#${bordered_tab}" type="button" role="tab" aria-controls="${bordered_tab}" aria-selected="false">${element.nombre}</button>
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
                    if (searchLenteTerm) {
                        stock_actual = parseInt(searchLenteTerm.stock);
                    }
                    tableHTML += `<td onclick="addLenteTerm(this)" data-id="${element.id}" data-marca="${element.marca}" data-diseno="${element.diseno}" data-nombre="${element.nombre}" data-esfera="${val_esf}" data-cilindro="${val_cil}" style="border: 1px solid rgb(155, 148, 148)">${stock_actual}</td>`;

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
    }
}

function addLenteTerm(cell) {
    let { id, marca, diseno, nombre, esfera, cilindro } = cell.dataset;
    document.getElementById('marca_lente_term').value = marca;
    document.getElementById('diseno_lente_term').value = diseno;
    sessionStorage.setItem('lente_term_id', id);
    document.getElementById('esfera_lente').value = esfera;
    document.getElementById('cilindro_lente').value = cilindro;

    $("#modal-stock-lente-term").modal('show');
}
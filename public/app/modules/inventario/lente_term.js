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
                tableHTML += `<th style="border: 1px solid rgb(155, 148, 148)">${cil.toFixed(2)}</th>`;
            }

            tableHTML += `
                            </tr>
                        </thead>
                        <tbody>
            `;

            // Generar filas de esferas
            for (let esf = esf_hasta; esf >= esf_desde; esf -= 0.25) {
                let valores = (parseFloat(esf) > 0) ? '+' + esf.toFixed(2) : esf.toFixed(2);
                tableHTML += `<tr><th style="border: 1px solid rgb(155, 148, 148)">${valores}</th>`;
                for (let cil = cil_desde; cil <= cil_hasta; cil += 0.25) {
                    tableHTML += `<td onclick="addLenteTerm(this)" data-id="${element.id}" data-marca="${element.marca}" data-diseno="${element.diseno}" data-nombre="${element.nombre}" style="border: 1px solid rgb(155, 148, 148)">0</td>`; // Puedes reemplazar '1' con datos dinámicos si es necesario
                }
                tableHTML += `</tr>`;
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
    let { id, marca, diseno, nombre } = cell.dataset;
    document.getElementById('marca_lente_term').value = marca;
    document.getElementById('diseno_lente_term').value = diseno;
    sessionStorage.setItem('lente_term_id', id);

    const row = cell.parentElement; // Fila de la celda
    const table = row.parentElement.parentElement; // Tabla completa

    const cellIndex = Array.from(row.cells).indexOf(cell);
    const rowTitle = row.querySelector('th').innerText;
    const colTitle = table.querySelector(`thead tr th:nth-child(${cellIndex + 1})`).innerText;

    document.getElementById('esfera_lente').value = rowTitle;
    document.getElementById('cilindro_lente').value = colTitle;

    $("#modal-stock-lente-term").modal('show');
}
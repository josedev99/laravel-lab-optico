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
                    <table style="width:100%;border-collapse: collapse;text-align:center">
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
                tableHTML += `<tr><th style="border: 1px solid rgb(155, 148, 148)">${esf.toFixed(2)}</th>`;
                for (let cil = cil_desde; cil <= cil_hasta; cil += 0.25) {
                    tableHTML += `<td style="border: 1px solid rgb(155, 148, 148)">0</td>`; // Puedes reemplazar '1' con datos dinámicos si es necesario
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


function createTabLenteTerminadossss(data) {
    let tabs_lentes_term = document.getElementById('tabs_lentes_term');
    if (tabs_lentes_term) {
        tabs_lentes_term.innerHTML = '';
        let cardBody = document.createElement('div');
        cardBody.classList.add('card-body', 'p-1');
        let ul = document.createElement('ul');
        data.forEach((element) => {
            let element_tab = 'tab-' + element.id;
            let bordered_tab = 'bordered-' + element.id;
            let esf_desde = '-4.00';
            let esf_hasta = '+4.00';
            let cil_desde = '-3.00';
            let cil_hasta = '0.00';

            ul.classList.add('nav', 'nav-tabs', 'nav-tabs-bordered');
            ul.role = 'role="tablist"';
            ul.innerHTML += `
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="${element_tab}" data-bs-toggle="tab" data-bs-target="#${bordered_tab}" type="button" role="tab" aria-controls="home" aria-selected="true">${element.nombre}</button>
                </li>
            `;
            cardBody.appendChild(ul);
            let tab_content = document.createElement('div');
            tab_content.classList.add('tab-content', 'pt-2');
            tab_content.innerHTML += `
            <div class="tab-pane fade" id="${bordered_tab}" role="tabpanel" aria-labelledby="${element_tab}">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th>Esf/Cil</th>
                                    <!-- Columnas de cilindros -->
                                    <th>0.00</th>
                                    <th>-0.25</th>
                                    <th>-0.50</th>
                                    <th>-0.75</th>
                                    <th>-1.00</th>
                                    <th>-1.25</th>
                                    <th>-1.50</th>
                                    <th>-1.75</th>
                                    <th>-2.00</th>
                                    <th>-2.25</th>
                                    <th>-2.50</th>
                                    <th>-2.75</th>
                                    <th>-3.00</th>
                                    <th>-3.25</th>
                                    <th>-3.50</th>
                                    <th>-3.75</th>
                                    <th>-4.00</th>
                                    <th>-4.25</th>
                                    <th>-4.50</th>
                                    <th>-4.75</th>
                                    <th>-5.00</th>
                                    <th>-5.25</th>
                                    <th>-5.50</th>
                                    <th>-5.75</th>
                                    <th>-6.00</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Filas de esferas -->
                                <tr>
                                    <th>+6.00</th>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <th>+5.75</th>
                                    <!-- Rellena según sea necesario -->
                                </tr>
                                <!-- Agrega más filas aquí para las demás esferas -->
                            </tbody>
                        </table>
                        </div>
            `;

            cardBody.appendChild(tab_content);

            tabs_lentes_term.appendChild(cardBody);
        });
    }
}
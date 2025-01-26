console.log('init..')
    //btn_lente_roto
var items_lentes = [];

document.addEventListener('DOMContentLoaded', () => {
    $("#justif").selectize();
    $("#lente_especif").selectize();
    //Call datatable lentes rotos
    dataTable('dt-lentes-rotos', route('lente.roto.listar'));

    //Button open modal
    let btnLenteRoto = document.getElementById('btn_lente_roto');
    if (btnLenteRoto) {
        btnLenteRoto.addEventListener('click', () => {
            getLentesRotos();
            $("#modal-lente-roto").modal('show');
        })
    }
    //Procesar formulario para lente roto
    let formLenteRoto = document.getElementById('form-lente-roto');
    if (formLenteRoto) {
        formLenteRoto.addEventListener('submit', (e) => {
            e.preventDefault();
            let formData = new FormData(formLenteRoto);
            //Validaciones
            let optionReporte = document.querySelector('input[name="checkOptions"]:checked');
            if (optionReporte === null) {
                Swal.fire({
                    title: "Aviso",
                    text: 'Por favor, elige el tipo de daño para el lente roto.',
                    icon: "warning"
                });
                return;
            }
            let tipo_lente = $("#tipo_lente")[0].selectize.getValue();
            if (tipo_lente === "") {
                Swal.fire({
                    title: "Aviso",
                    text: 'Selecciona el tipo de lente',
                    icon: "warning"
                });
                return;
            }
            let espeficacion_lente = $("#lente_especif")[0].selectize.getValue();
            if (espeficacion_lente === "") {
                Swal.fire({
                    title: "Aviso",
                    text: 'Selecciona la esfera y el cilindro del lente roto.',
                    icon: "warning"
                });
                return;
            }
            let justif = $("#justif")[0].selectize.getValue();
            if (justif === "") {
                Swal.fire({
                    title: "Aviso",
                    text: 'Selecciona la justificación para el lente roto.',
                    icon: "warning"
                });
                return;
            }
            axios.post(route('lente.roto.save'), formData)
                .then((response) => {
                    console.log(response.data);
                    let { status, message } = response.data;
                    if (status === 'success') {
                        formLenteRoto.reset();
                        $("#tipo_lente").selectize()[0].selectize.clear();
                        $("#justif").selectize()[0].selectize.clear();
                        $("#modal-lente-roto").modal('hide');
                        Swal.fire({
                            title: "Éxito",
                            text: message,
                            icon: "success"
                        });
                        //refresh datatable
                        $("#dt-lentes-rotos").DataTable().ajax.reload();
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: message,
                            icon: "error"
                        });
                    }
                }).catch((err) => {
                    console.log(err);
                })
        })
    }
})

function addOptionsSelectTipo() {
    if (items_lentes.length > 0) {
        let selectize_lente = $("#tipo_lente").selectize({
            sortField: 'text',
            searchField: 'text',
            score: function(search) {
                return function(item) {
                    const text = item.text.toLowerCase();
                    const keyword = search.toLowerCase();
                    return text.includes(keyword) ? 1 : 0;
                };
            }
        })[0].selectize;
        selectize_lente.clear();
        selectize_lente.clearOptions();
        console.log(items_lentes);
        items_lentes.forEach(lente => {
            selectize_lente.addOption({
                value: lente.id,
                text: `${lente.nombre} ${lente.marca} ${lente.diseno}`
            })
        });
        //evento change
        selectize_lente.on('change', (value) => {
            let index = items_lentes.findIndex((lente) => parseInt(lente.id) === parseInt(value));
            if (index !== -1) {
                let stocks = items_lentes[index].stocks.filter((lente) => parseInt(lente.lente_term_id) === parseInt(value));
                addOptionsEsfCilLente(stocks);
            }
        })
    }
}

function addOptionsEsfCilLente(data) {
    let select_esf_cil = $("#lente_especif").selectize({
        sortField: 'text',
        searchField: 'text',
        score: function(search) {
            return function(item) {
                const text = item.text.toLowerCase();
                const keyword = search.toLowerCase();
                return text.includes(keyword) ? 1 : 0;
            };
        }
    })[0].selectize;
    select_esf_cil.clear();
    select_esf_cil.clearOptions();

    if (data.length > 0) {
        data.forEach(rx => {
            console.log(rx);
            select_esf_cil.addOption({
                value: `${rx.especif}`,
                text: `${rx.especif}`
            })
        });
    }
}


function getLentesRotos() {
    axios.post(route('lente.roto.obtener'))
        .then((response) => {
            let { status, data } = response.data;
            items_lentes = data;
            addOptionsSelectTipo();
        })
        .catch((err) => {
            console.log(err);
        })
        .finally(() => {

        })
}

function removeLenteRoto(element) {
    let key_item = element.dataset.key;

    Swal.fire({
        title: "Eliminar reporte lente roto?",
        text: "Esta acción removera el lente roto de forma permanente.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, continuar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post(route('lente.roto.remove'), { key: key_item })
                .then((response) => {
                    let { status, message } = response.data;
                    if (status === "success") {
                        Swal.fire({
                            title: "Éxito",
                            text: message,
                            icon: "success"
                        });
                        //refresh datatable
                        $("#dt-lentes-rotos").DataTable().ajax.reload();
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: message,
                            icon: "error"
                        });
                    }
                    console.log(response);
                })
                .catch((err) => {
                    console.log(err);
                })
        }
    });
}
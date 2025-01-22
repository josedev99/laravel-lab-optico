console.log('init..')
    //btn_lente_roto

document.addEventListener('DOMContentLoaded', () => {
    $("#justif").selectize();

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
            axios.post(route('lente.roto.save'), formData)
                .then((response) => {
                    console.log(response);
                    let { status, message } = response.data;
                    if (status === 'success') {
                        formLenteRoto.reset();
                        $("#buscar_lente").selectize()[0].selectize.clear();
                        $("#justif").selectize()[0].selectize.clear();
                        $("#modal-lente-roto").modal('hide');
                        Swal.fire({
                            title: "Éxito",
                            text: message,
                            icon: "success"
                        });
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


function getLentesRotos() {
    axios.post(route('lente.roto.obtener'))
        .then((response) => {
            let { status, data } = response.data;
            let selectize_lente = $("#buscar_lente").selectize({
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
            data.forEach(lente => {
                selectize_lente.addOption({
                    value: lente.especif,
                    text: lente.especif
                })
            });
        })
        .catch((err) => {
            console.log(err);
        })
        .finally(() => {

        })
}
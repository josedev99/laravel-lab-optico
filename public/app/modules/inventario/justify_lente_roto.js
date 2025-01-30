document.addEventListener('DOMContentLoaded', () => {
    let formJustifyLenteRoto = document.getElementById('form-justify-lente-roto');
    if (formJustifyLenteRoto) {
        formJustifyLenteRoto.addEventListener('submit', (e) => {
            e.preventDefault();
            let formData = new FormData(formJustifyLenteRoto);

            //validaciones
            let checkCatLenteRotoValue = document.querySelector('input[name="checkCatLenteRoto"]:checked');

            if (checkCatLenteRotoValue === null) {
                Swal.fire({
                    title: "Aviso",
                    text: 'La categoria de la justificación es obligatorio.',
                    icon: "warning"
                });
                return;
            }

            let justify_lente_roto = document.getElementById('justify_lente_roto');
            if (justify_lente_roto.value.trim() === "") {
                Swal.fire({
                    title: "Aviso",
                    text: 'La justificación es obligatorio.',
                    icon: "warning"
                });
                return;
            }
            let btnSaveJustify = document.getElementById('btnSaveJustify');
            btnSaveJustify.disabled = true;
            axios.post(route('justify.lente.roto.save'), formData)
                .then((response) => {
                    let { message, status, data } = response.data;
                    if (status === "success") {
                        Swal.fire({
                            title: "Éxito",
                            text: message,
                            icon: "success"
                        });
                        let checkCatId = (data.categoria === "Bodega") ? 'checkBodega' : 'checkMontaje';
                        setOptionCatAndSelectValue(checkCatId, 'justif', data.justificacion);
                        $("#modal-justify-lente-roto").modal('hide');
                        formJustifyLenteRoto.reset();
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: message,
                            icon: "error"
                        });
                    }
                })
                .catch((err) => {
                    Swal.fire({
                        title: "Error",
                        text: "Ha ocurrido un error inesperado.",
                        icon: "error"
                    });
                    btnSaveJustify.disabled = false;
                }).finally(() => {
                    btnSaveJustify.disabled = false;
                })
        })
    }
})

function setOptionCatAndSelectValue(checkElementId, selectize_id, value) {
    let checkOptionCat = document.getElementById(checkElementId);
    if (checkOptionCat) {
        checkOptionCat.checked = true;
        checkOptionCat.click();
        setTimeout(() => {
            let selectize_justify = $(`#${selectize_id}`)[0].selectize;
            selectize_justify.addOption({
                value: value,
                text: value
            })
            selectize_justify.setValue(value);
        }, 1500)
    }
}
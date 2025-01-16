document.addEventListener('DOMContentLoaded', () => {
    try {
        getClientes();
    } catch (err) {
        console.log(err)
    }
})

function getClientes() {
    axios.post(route('venta.lab.clientes'))
        .then((response) => {
            console.log(response);
            let data = response.data;
            let clientes_selectize = $("#cliente_venta").selectize()[0].selectize;
            clientes_selectize.clear();
            clientes_selectize.clearOptions();
            data.forEach(element => {
                clientes_selectize.addOption({
                    value: element.id,
                    text: `${element.nombre} - ${element.telefono}`
                });
            });
        }).catch((err) => {
            console.log(err);
        }).finally(() => {

        })
}
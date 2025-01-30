var productos = [];
var cart_productos = [];

document.addEventListener('DOMContentLoaded', () => {
    try {
        //getClientes();
        getProductosAll();
        //selectize asesor
        $("#cliente_venta").selectize();
        $("#paciente_venta").selectize();
        $("#asesor_venta").selectize();
        $("#tipo_venta").selectize();
        $("#forma_pago").selectize();

        //handle event change input producto
        let btnAddItemsProduct = document.getElementById('btnAddProduct')
        if (btnAddItemsProduct) {
            btnAddItemsProduct.addEventListener('click', (e) => {
                $("#modal-add-items-prodict").modal('show');
            })
        }
    } catch (err) {
        console.log(err)
    }
})

function getClientes() {
    axios.post(route('venta.lab.clientes'))
        .then((response) => {
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

function getProductosAll() {
    axios.post(route('venta.lab.productos'))
        .then((response) => {
            productos = response.data;
        }).catch((err) => {
            console.log(err)
        })
}

function addItemVenta(element) {
    let codigo = element.dataset.codigo;
    let index = productos.findIndex((product) => product.codigo == codigo);
    console.log(index);
    if (index !== -1) {
        let product = productos[index];
        product.stock = 1;
        cart_productos.push(product);
    }
}
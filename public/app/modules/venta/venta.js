var productos = [];

document.addEventListener('DOMContentLoaded', () => {
    try {
        getClientes();
        getProductosAll();

        //handle event change input producto
        let iSearchProduct = document.getElementById('input_search_product')
        if (iSearchProduct) {
            iSearchProduct.addEventListener('keyup', (e) => {
                filtrarProduct(e.target.value);
            })
        }
    } catch (err) {
        console.log(err)
    }
})

function filtrarProduct(stringValue) {
    const regex = new RegExp(stringValue, 'gi');
    let product_filtrado = productos.filter((producto) => regex.test(producto.codigo));

    let component_list_product = document.getElementById('component_list_product');
    if (product_filtrado.length > 0) {
        component_list_product.innerHTML = ``;
        let table = document.createElement('table');
        product_filtrado.forEach((item, index) => {
            let row = `<tr class="text-center">
                    <td>${index + 1}</td>
                    <td>${item.codigo}</td>
                    <td>${item.nombre} ${item.marca} ${item.diseno} (esfera: ${item.esfera}, cilindro: ${item.cilindro})</td>
                    <td><b>Stock: ${item.stock}</b></td>
                    <td><b>$${parseFloat(item.precio_venta).toFixed(2)}</b></td>
                    <td><button type="button" class="btn btn-outline-success btn-sm" style="border: none;"><i class="bi bi-plus-circle"></i></button></td>
                </tr>`;
            table.innerHTML += row;
        })
        component_list_product.appendChild(table);
    } else {
        component_list_product.innerHTML = ``;
    }
    console.log(product_filtrado);
}

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
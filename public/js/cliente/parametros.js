$(document).ready(function () {

    $cliente = $('#cliente_id');
    let idCliente = $('#id_cliente').val();

    $cliente.on('change', function () {
        const value = $('#cliente_id').val();
        if (value == "") {
            $('#tabla_registros').hide();
            $('#tabla_registros').empty();
        } else {
            const url = '/cliente/parametros';
            const datitos = new FormData();
            datitos.append('id_cliente', value);

            fetch(url, {
                method: 'POST',
                body: datitos
            })
            .then(function (response) {
                return response.text();
            })
            .then(function (html) {
                document.querySelector('#tabla_registros').innerHTML = html;
                $('#tabla_registros').show();
            })
        }
    });

    if (idCliente != "") {
        muestraRegistros(idCliente);
    }

    function muestraRegistros(idCliente) {
        const url = '/cliente/parametros';
        const datitos = new FormData();
        datitos.append('id_cliente', idCliente);

        fetch(url, {
            method: 'POST',
            body: datitos
        })
        .then(function (response) {
            return response.text();
        })
        .then(function (html) {
            document.querySelector('#tabla_registros').innerHTML = html;
            $('#tabla_registros').show();
        })
    }
});


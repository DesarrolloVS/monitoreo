$(document).ready(function(){
    $cliente = $('#cliente_id');

    $cliente.on('change', function () {
        const value = $('#cliente_id').val();
        if (value == "") {
            $('#tabla_vehiculos').hide();
            $('#tabla_vehiculos').empty();
        } else {
            const url = '/vehiculos/cliente';
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
                document.querySelector('#tabla_vehiculos').innerHTML = html;
                $('#tabla_vehiculos').show();
            })
        }
    });
});



$(document).ready(function () {
    $cliente = $('#cliente_id');

    $cliente.on('change', function () {
        const value = $('#cliente_id').val();
        if (value == "") {
            $('#usuarios,#turnos').hide();
            $('#usuarios').empty();
        } else {
            const url = '/usuarios/cliente';
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
                document.querySelector('#usuarios').innerHTML = html;
                $('#usuarios,#turnos').show();
            })
        }
    });
});


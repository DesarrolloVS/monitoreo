$(document).ready(function(){
    $cliente = $('#cliente_id');

    const value = $('#cliente_id').val();

    if (value == "") {
        $('#agregar').hide();
    } else {
        $('#agregar').show();
    }

    // $cliente.on('change', function () {
    //     const value = $('#cliente_id').val();
    //     if (value == "") {
    //         $('#tabla_vehiculos').hide();
    //         $('#tabla_vehiculos').empty();
    //     } else {
    //         const url = '/vehiculos/cliente';
    //         const datitos = new FormData();
    //         datitos.append('id_cliente', value);

    //         fetch(url, {
    //             method: 'POST',
    //             body: datitos
    //         })
    //         .then(function (response) {
    //             return response.text();
    //         })
    //         .then(function (html) {
    //             document.querySelector('#tabla_vehiculos').innerHTML = html;
    //             $('#tabla_vehiculos').show();
    //         })
    //     }
    // });
    $cliente.on('change', function () {
        const idCliente = $('#cliente_id').val();
        if (idCliente == "") {
            const parametro = 0;
            const url = '/cat_vehiculos/index/' + parametro;
            window.location = url;            
        } else {
            //const url = '/cat_gpscliente?cliente_id=' + idCliente;
            const url = '/cat_vehiculos/index/' + idCliente;
            window.location = url;            
        }
    });
});



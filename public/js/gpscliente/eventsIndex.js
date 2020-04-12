$(document).ready(function () {
    $cliente = $('#cliente_id');    

    const value = $('#cliente_id').val();

    if (value == "") {
        $('#agregar').hide();
    } else {
        $('#agregar').show();
    }

    $cliente.on('change', function () {
        const idCliente = $('#cliente_id').val();
        if (idCliente == "") {
            const parametro = 0;
            const url = '/cat_gpscliente/index/' + parametro;
            window.location = url;            
        } else {
            //const url = '/cat_gpscliente?cliente_id=' + idCliente;
            const url = '/cat_gpscliente/index/' + idCliente;
            window.location = url;            
        }
    });
});
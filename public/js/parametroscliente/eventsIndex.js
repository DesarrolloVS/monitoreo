$(document).ready(function () {
    $cliente = $('#cliente_id');    

    const value = $('#cliente_id').val();

    if (value == "") {
        $('#actualizar').hide();
    } else {
        $('#actualizar').show();
    }

    $cliente.on('change', function () {
        const idCliente = $('#cliente_id').val();
        if (idCliente == "") {
            const parametro = 0;
            const url = '/cat_parametroscliente/index/' + parametro;
            window.location = url;            
        } else {
            //const url = '/cat_gpscliente?cliente_id=' + idCliente;
            const url = '/cat_parametroscliente/index/' + idCliente;
            window.location = url;            
        }
    });
});
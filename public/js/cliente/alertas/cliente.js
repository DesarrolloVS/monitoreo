// function seteaValores(){
//     alert('ahuevito perro');
// }

function actualizaAlertas(){
    const split = $('#gpscliente_id').val();
    const ids = split.split('|');
    const gpsMarcaModeloId = ids[0];
    const gpsClienteId = ids[1];
    var datos = [];
    var chequeados = 0;

    $("#tabla_alertas input:checkbox:checked").each(
	    function() {
            // var alertas = {id_alerta:$(this).data('alerta_id')};
            var alertas = $(this).data('alerta_id');
			datos.push(alertas);
	        chequeados++;
	    }
    );          // console.log(datos);// return false;

    const datitos = new FormData();
    const url3 = '/cliente/updatealertas';
    datitos.append('alertas', datos);
    datitos.append('gpscliente_id', gpsClienteId);
    datitos.append('num_reg', chequeados);

    fetch(url3, {
        method: 'POST',
        body: datitos
    })
    // .then(function (response) {
    //     return response.text();
    // })
    // .then(function (html) {
    //      document.querySelector('#res').innerHTML = html;
    //     //  $('#mm,#gpscliente_id').show();
    // })
    .then(function (response) {
        window.location.href = "/cat_alertascliente";
    })
    

}

function escuchaChecks(){
    $updatee = $('#updatee');
    $updatee.show();
}

$(document).ready(function(){
    $cliente = $('#cliente_id');
    $g = $('#gpscliente_id');

    $cliente.on('change', function () {
        const value = $('#cliente_id').val();
        if (value == "") {
            $('#gpscliente_id,#mm').hide();
            $('#gpscliente_id').empty();
        } else {
            const url = '/cliente/marcamodelo';
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
                document.querySelector('#gpscliente_id').innerHTML = html;
                $('#mm,#gpscliente_id').show();
            })
        }
    });

    $g.on('change', function () {
        const split = $('#gpscliente_id').val();
        const ids = split.split('|');
        const gpsMarcaModeloId = ids[0];
        const gpsClienteId = ids[1];
        
        if (gpsMarcaModeloId == "") {
            alert('nada');
        } else {
            const url2 = '/cliente/alertas';
            const datitos2 = new FormData();
            datitos2.append('gpsmarcamodelo_id', gpsMarcaModeloId);
            datitos2.append('gpscliente_id', gpsClienteId);

            fetch(url2, {
                method: 'POST',
                body: datitos2
            })
            .then(function (response) {
                return response.text();
            })
            .then(function (html) {
                document.querySelector('#tabla_alertas').innerHTML = html;
                //$('#mm,#gpscliente_id').show();
            })
        }
    });
});
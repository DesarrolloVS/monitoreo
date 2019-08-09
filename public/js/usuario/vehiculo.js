// $cliente = $('#cliente_id');
// $marca = $('#marca_id');

// $cliente.on('change', function () {
//     const value = $('#cliente_id').val();
//     if (value == "") {
//         $('#iniciales,#complement').hide();
//         $('#marca').val("");
//         $('#submarca').empty();
//     } else {
//         $('#iniciales').show();
//     }
// });

$marca.on('change', function () {
    const value = $('#marca_id').val();
    if (value == "") {
        $('#submarca,#complement').hide();
        $('#submarca').empty();
    } else {
        const url = '/vehiculo/marca';
        const datitos = new FormData();
        datitos.append('id_marca', value);

        fetch(url, {
            method: 'POST',
            body: datitos
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (html) {
                document.querySelector('#submarca').innerHTML = html;
                $('#submarca,#complement').show();
            })
    }
});
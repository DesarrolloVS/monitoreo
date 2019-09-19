$(document).ready(function(){
    $marca = $('#marca_id');

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
})


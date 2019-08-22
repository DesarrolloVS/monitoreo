$mm = $('#gpsmarcamodelo_id');
let g = $('#g').val();

$mm.on('change', function () {
    const value = $(this).val();
    if (value == "") {
        $('#tabla_campos').hide();
        $('#tabla_campos').empty();
    } else {
        const url = '/gps/campos';
        const datitos = new FormData();
        datitos.append('gpsmarcamodelo_id', value);

        fetch(url, {
            method: 'POST',
            body: datitos
        })
        .then(function (response) {
            return response.text();
        })
        .then(function (html) {
            document.querySelector('#tabla_campos').innerHTML = html;
            $('#tabla_campos').show();
        })
    }
});



if (g != "") {
    const url = '/gps/campos';
    const datitos = new FormData();
    datitos.append('gpsmarcamodelo_id', g);

    fetch(url, {
        method: 'POST',
        body: datitos
    })
    .then(function (response) {
        return response.text();
    })
    .then(function (html) {
        document.querySelector('#tabla_campos').innerHTML = html;
        $('#tabla_campos').show();
        $('#gpsmarcamodelo_id').val(g)
    })
}
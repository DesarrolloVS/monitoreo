$mm = $('#gpsmarcamodelo_id');

$mm.on('change', function () {
    const value = $(this).val();
    if (value == "") {
        // $('#complement,#save').hide();
        //$('#complement').empty();
    } else {
        const url = '/gpsalerta/complement';
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
            document.querySelector('#complement').innerHTML = html;
            $('#save').show();
        })
    }
});
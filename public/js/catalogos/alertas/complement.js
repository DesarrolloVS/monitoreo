$(document).ready(function () {
    $mm = $('#gpsmarcamodelo_id');
    $td = $('#tipodato');
    

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

    $td.on('change', function () {
        const val = $(this).val();
        if (val == "") {
            // $('#complement,#save').hide();
            //$('#complement').empty();
        } else {
            const url = '/gpsalerta/valor';
            const datitoz = new FormData();
            datitoz.append('tipodato', val);

            fetch(url, {
                method: 'POST',
                body: datitoz
            })
            .then(function (response) {
                return response.text();
            })
            .then(function (html) {
                document.querySelector('#complement2').innerHTML = html;
                //$('#save').show();
            })
        }
    });
});


function controlaCampos(val){
    if(val == 1){
        $('.opcional').hide();        
        $('#div_alerta,#div_tipoalerta,#div_tipodato,#div_valor,#save').show();
        
    }else if(val == 2){
        $('.opcional').hide();        
        $('#div_alerta,#div_tipoalerta,#div_tipodato,#div_valor,#div_revisar,#save').show();
    }else if(val == 3){
        $('.opcional').hide();        
        $('#div_alerta,#div_tipoalerta,#div_tipodato,#div_valor,#div_revisar,#save').show();
    }else if(val == 4){
        $('.opcional').hide();        
        $('#div_alerta,#div_tipoalerta,#div_tipodato,#div_valor,#div_revisar,#save').show();
    }else if(val == 5){
        $('.opcional').hide();        
        $('#div_alerta,#div_tipoalerta,#div_tipodato,#div_valor,#div_revisar,#save').show();
    }else{
        $('.opcional,#save').hide();
    }
}


$(document).ready(function () {
    $mm = $('#gpsmarcamodelo_id');
    $td = $('#tipodato');
    $campo = $('#camposgps_id');
    $f = $('#funcion');
    

    $mm.on('change', function () {
        const value = $(this).val();
        if (value == "") {
            $('#div_campos,#div_conf').hide();
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
                // document.querySelector('#complement').innerHTML = html;
                document.querySelector('#camposgps_id').innerHTML = html;
                $('#div_campos').show();
                $('#div_conf').hide();
                // $('#save').show();
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

    $campo.on('change', function () {
        const val = $(this).val();
        if (val == "") {
            $('#div_conf').hide();
        } else {
            $('#div_conf').show();
            
        }
    });

    $f.on('change', function () {
        const val = $(this).val();
        if (val == "") {
            $('.opcional,#save').hide();
        } else {
            controlaCampos(val);
        }
    });
});


$(document).ready(function(){
    $gps = $('#gpscliente_id');
    $asignar = $('#asignar');

    $gps.on('change',function(){
        let v = $('#gpscliente_id').val();
        if(v != ""){
            $asignar.show();
        }else{
            $asignar.hide();
        }
    })
});


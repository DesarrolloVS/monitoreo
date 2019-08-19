$res = $('#responsablevehiculo_id');
$asignar = $('#asignar');

$res.on('change',function(){
    let r = $('#responsablevehiculo_id').val();
    if(r != ""){
        $asignar.show();
    }else{
        $asignar.hide();
    }
})
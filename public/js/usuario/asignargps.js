// $cliente = $('#cliente_id');
// $cliente.on('change', function () {
//     const value = $('#cliente_id').val();
//     if (value == "") {
//         $('#gpss,#asignar').hide();
//         $('#gpss').empty();
//     } else {
//         const url = '/vehiculo/gps';
//         const datitos = new FormData();
//         datitos.append('id_cliente', value);

//         fetch(url, {
//             method: 'POST',
//             body: datitos
//         })
//             .then(function (response) {
//                 return response.text();
//             })
//             .then(function (html) {
//                 document.querySelector('#gpss').innerHTML = html;
//                 let bandera = $('#bandera').val();
//                 $('#gpss').show();
//                 $('#asignar').show();
//                 // if(bandera == 1){
//                 //     $('#asignar').show();
//                 // }else{
//                 //     $('#asignar').hide();
//                 // }
//             })
//     }
// });

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
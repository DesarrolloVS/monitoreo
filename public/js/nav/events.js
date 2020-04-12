$(document).ready(function(){
    $(document).on('click','#menues .dropdown-menu a',function(){
        let idMenu = $(this).attr('id');
        let option = "";
        switch(idMenu){
            case 'cat_gpscliente':
            option = 'cat_gpscliente';
            cargaMenu(option);
            break;

            case 'cat_vehiculos':
            option = 'cat_vehiculos';
            cargaMenu(option);
            break;

            case 'cat_parametroscliente':
            option = 'cat_parametroscliente';
            cargaMenu(option);
            break;

            default:
            console.log('no elegiste ninguna opcion');
            break;
        }
    })

    function cargaMenu(option){             //console.log('option = ' + option);            //return false;
        let idCliente = $('#cliente_id').val();

        if(typeof idCliente === 'undefined'){
            idCliente = 0;
            const url = '/'+option+'/index/' + idCliente;
            window.location = url;
        }else{
            const param = 0;
            const url = '/'+option+'/index/' + param;
            window.location = url;
        }
        //const url = '/cat_gpscliente/index/' + idCliente;
        
    }

})
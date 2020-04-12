//UNA VEZ Q CARGA EL DOOM...
$(document).ready(function(){
    var $checks = $('.params');
    var $actualizar = $('#actualizar');
	
	$checks.on('click',function(){
		var chequeados = 0;
		$("#table_params input:checkbox:checked").each(   
	 	   function() {chequeados++;}
		);
		
		if(chequeados == 0){
			//$('#div_actualizar').hide();
		}else{
			//$('#div_actualizar').show();
        }
        $('#div_actualizar').show();
    });	
    
    $actualizar.on('click',function(){
        var datos = [];
        const idCliente = $('#cliente_id').val();

        $("#table_params input:checkbox:checked").each(   
            function() {
                var parametros = {id_param:$(this).data('id_param')};
                datos.push(parametros);
            }
        );
        
        var datitos = {checks:datos,cliente_id:idCliente};

        console.log(datos);
	
        var url = '/cat_parametroscliente/storeparams';
        var petichon = $.ajax({
            url: url,
            type: "POST",
            dataType: 'json',
            data: datitos
        });
	
        petichon.done(function(res){
            if(res.codigo>0){
                //$(location).attr('href',);
                const url = '/cat_parametroscliente/index/' + idCliente;
                window.location = url;
            }else{

            }		
        });

        // fetch(url, {
        //     body:datitos,
        //     method: 'POST'
        // })
        // .then(function () {
        //     console.log('ahuevo');
        // })

	});	
});
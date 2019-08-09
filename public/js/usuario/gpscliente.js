$cliente = $('#cliente_id');

$cliente.on('change',function(){
  const value = $('#cliente_id').val();
  if(value == ""){
    $('#datos_gps,#submit_form').hide();
    $('#datos_gps').empty();    

  }else{
    const url = '/gps/form';
    //const datitos =  new FormData();
    //datitos.append('id_cliente',value);

    fetch(url,{
      method: 'POST'
      //body: datitos
    })
    .then(function(response){
      return response.text();
    })
    .then(function(html){
      document.querySelector('#datos_gps').innerHTML = html;
      $('#datos_gps,#submit_form').show();
    })
  }
});
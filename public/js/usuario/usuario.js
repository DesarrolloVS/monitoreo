function calc(){
    if (document.getElementById('empleado').checked) 
  {   
      $('#tipo_empleado').show();
      $('#empleado').val(1);
  } else {
    $('#tipo_empleado').hide();
    $('#tipoempleado_id').val("");
    $('#empleado').val(0);
  }
}

const inicia = $('#empleado').val();

if(inicia == 1){
  $('#tipo_empleado').show();
}
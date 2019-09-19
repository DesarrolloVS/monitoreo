function calc() {
  if (document.getElementById('empleado').checked) {
    $('#tipo_empleado').show();
    $('#empleado').val(1);
  } else {
    $('#tipo_empleado').hide();
    $('#tipoempleado_id').val("");
    $('#empleado').val(0);
  }
}

$(document).ready(function () {
  
  const inicia = $('#empleado').val();

  if (inicia == 1) {
    $('#tipo_empleado').show();
  }

  $cliente = $('#cliente_id');

  $cliente.on('change', function () {
    const value = $('#cliente_id').val();
    if (value == "") {
      $('#datos_usuario').hide();
      $('#tipo_empleado').empty();
    } else {
      const url = '/tipoempleado/cliente';
      const datitos = new FormData();
      datitos.append('id_cliente', value);

      fetch(url, {
        method: 'POST',
        body: datitos
      })
        .then(function (response) {
          return response.text();
        })
        .then(function (html) {
          document.querySelector('#tipo_empleado').innerHTML = html;
          $('#datos_usuario').show();
        })
    }
  });
});


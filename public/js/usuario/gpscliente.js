$(document).ready(function () {
  $cliente = $('#cliente_id');

  const value = $('#cliente_id').val();
  if (value == "") {
    $('#datos_gps,#submit_form').hide();
    $('#datos_gps').empty();
    const sinDatos = `<div class="row">
                          <div class="col">
                              <br><br>
                              <div class="alert alert-danger alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <strong>Atención: </strong> Debe de seleccionar un cliente.
                              </div>
                          </div>
                      </div>`;
      $('#datos_gps')
      .html(sinDatos)
      .show();
  } else {
    const url = '/gps/form';
    //const datitos =  new FormData();
    //datitos.append('id_cliente',value);

    fetch(url, {
      method: 'POST'
      //body: datitos
    })
      .then(function (response) {
        return response.text();
      })
      .then(function (html) {
        document.querySelector('#datos_gps').innerHTML = html;
        $('#datos_gps,#submit_form').show();
      })
  }

  $cliente.on('change', function () {
    const value = $('#cliente_id').val();
    if (value == "") {
      $('#datos_gps,#submit_form').hide();
      $('#datos_gps').empty();
      const sinDatos = `<div class="row">
                          <div class="col">
                              <br><br>
                              <div class="alert alert-danger alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <strong>Atención: </strong> Debe de seleccionar un cliente.
                              </div>
                          </div>
                      </div>`;
      $('#datos_gps')
      .html(sinDatos)
      .show();

      //const clienteNombre = $('#cliente_id option:selected').text();
      $('#cliente_nombre1,#cliente_nombre2').text("");

    } else {
      const url = '/gps/form';
      fetch(url, {
        method: 'POST'
      })
        .then(function (response) {
          return response.text();
        })
        .then(function (html) {
          document.querySelector('#datos_gps').innerHTML = html;
          const clienteNombre = $('#cliente_id option:selected').text();
          $('#cliente_nombre1,#cliente_nombre2').text(clienteNombre);
          $('#datos_gps,#submit_form').show();
        })
    }
  });
});
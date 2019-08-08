$marca = $('#marca_id');

$marca.on('change', function () {
    const value = $('#marca_id').val();
    if (value == "") {
        $('#sub,#save').hide();
        $('#descripcion').val("");

    } else {
        $('#sub,#save').show();
    }
});
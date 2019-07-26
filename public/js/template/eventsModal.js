//CADA QUE SE APLICA UN CLICK EN LAS ACCIONES DEL MODAL NUMERO 1
$(document).on("click", "[data-accion=accion]", function () {
    var id = "";
    id = $(this).attr("id");

    switch (id) {
        case "registrar_geocerca":
            registrarGeocerca();
            break;
        default:
            mostrarMensaje("error", "ocurrio un error con la acción");
            return false;
    }

});
function mostrarMensaje(tipo, mensaje) {
    //SUCCESS (VERDE)	//INFO (AZUL)	//WARNING (AMARILLO)	//DANGER (ROJO)
    var icono = '';
    switch (tipo) {
        case 'error': icono = 'glyphicon glyphicon-remove';
            tipo = 'danger';
            break;
        case 'correcto': icono = 'glyphicon glyphicon-ok';
            tipo = 'success';
            break;
        case 'mensaje': icono = 'glyphicon glyphicon-eye-open';
            tipo = 'info';
            break;
        case 'alerta': icono = 'glyphicon glyphicon-warning-sign';
            tipo = 'warning';
            break;
        default: icono = 'glyphicon glyphicon-warning-sign';
            tipo = 'error';
            mensaje = 'Asignación de tipo incorrecto. (Error: MSG0001)';
            break;
    }

    $.notify({
        // options
        icon: icono,
        title: '<strong>Atención: </strong>',
        message: mensaje
    }, {
            // settings
            type: tipo
        });
}

function zoom(query) {
    cadena = `https://${userName}.carto.com/api/v2/sql/?format=geojson&q=${query}`;
    cadena += `&api_key=${apiKey}`;
    return fetch(cadena)
        .then((resp) => resp.json())
        .then((response) => {
            geojsonLayer = L.geoJson(response)
            map.fitBounds(geojsonLayer.getBounds());
        })
}



function showSpinner() {
    let spinner = document.getElementById("spinner");
    spinner.classList.add('show');
}

function hideSpinner() {
    let spinner = document.getElementById("spinner");
    spinner.classList.remove('show');
}



function jsShowWindowLoad(mensaje) {
    //eliminamos si existe un div ya bloqueando
    jsRemoveWindowLoad();

    //si no enviamos mensaje se pondra este por defecto
    if (mensaje === undefined) mensaje = "Procesando la información ...Espere por favor";

    //centrar imagen gif
    height = 20;//El div del titulo, para que se vea mas arriba (H)
    var ancho = 0;
    var alto = 0;

    //obtenemos el ancho y alto de la ventana de nuestro navegador, compatible con todos los navegadores
    if (window.innerWidth == undefined) ancho = window.screen.width;
    else ancho = window.innerWidth;
    if (window.innerHeight == undefined) alto = window.screen.height;
    else alto = window.innerHeight;

    //operación necesaria para centrar el div que muestra el mensaje
    var heightdivsito = alto / 2 - parseInt(height) / 2;//Se utiliza en el margen superior, para centrar

    //imagen que aparece mientras nuestro div es mostrado y da apariencia de cargando
    //imgCentro = "<div style='text-align:center;height:" + alto + "px;'><div  style='color:#000;margin-top:" + heightdivsito + "px; font-size:20px;font-weight:bold'>" + mensaje + "</div><img  src='img/load.gif'></div>";
    imgCentro = "<div style='text-align:center;height:" + alto + "px;'><div  style='color:#000;margin-top:" + heightdivsito + "px; font-size:20px;font-weight:bold'>";

    //creamos el div que bloquea grande------------------------------------------
    div = document.createElement("div");
    div.id = "WindowLoad"
    div.style.width = ancho + "px";
    div.style.height = alto + "px";
    $("body").append(div);

    //creamos un input text para que el foco se plasme en este y el usuario no pueda escribir en nada de atras
    input = document.createElement("input");
    input.id = "focusInput";
    input.type = "text"

    //asignamos el div que bloquea
    $("#WindowLoad").append(input);

    //asignamos el foco y ocultamos el input text
    $("#focusInput").focus();
    $("#focusInput").hide();

    //centramos el div del texto
    $("#WindowLoad").html(imgCentro);

}

function jsRemoveWindowLoad() {
    // eliminamos el div que bloquea pantalla
    $("#WindowLoad").remove();
}



function iniciaMapa() {
    //jsShowWindowLoad();
    //showSpinner();
    setTimeout(function () {
        seteaCapas();
    }, 1500)
}

function seteaCapas() {

    map = L.map('map', {
        zoomControl: false
    });
    
    map.setView([19.325075030834952, -99.13307189941406], 11);
    client = new carto.Client({
        apiKey: apiKey,
        username: userName
    });

    L.control.zoom({
        position: 'topright'
    }).addTo(map);

    map.scrollWheelZoom.disable();
    L.tileLayer(mapBase, {
        maxZoom: 18,            //map.scrollWheelZoom.disable();  L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {  maxZoom: 18,
    }).addTo(map);

    map.on(L.Draw.Event.CREATED, function (e) {         //console.log(e);
        const layer = e.layer;
        var type = e.layerType;
        const geoJson = layer.toGeoJSON();
        const coor = JSON.stringify(geoJson.geometry);       
        const coorPolygon = geoJson.geometry.coordinates       //alert(coor);
        const centroid = turf.centroid(geoJson.geometry);
        const lonCentroid = centroid.geometry.coordinates[0];
        const latCentroid = centroid.geometry.coordinates[1];
        
        if (type === 'marker') {
            alert('crear marker');
        } else if (type === 'polyline') {
            const url = 'forms/form_geocerca'
            fetch(url, {
                method: 'POST'
            })
            .then(function (response) {
                return response.text();
            }).then(function (string) {
                document.querySelector('#modal_content').innerHTML = string;
                $('#modal_title').html('NUEVA GEOCERCA');
                $('[data-accion=accion]').attr('id','registrar_geocerca');
                $('[data-accion=accion]').html('<span><i class="fas fa-plus"></i></span>&nbsp;Registrar');
                $('[data-accion=accion],#modal_cerrar').show();
                $('#latitud').val(latCentroid);
                $('#longitud').val(lonCentroid);
                $('#coor').val(coor);
                $('#coor_polygon').val(coorPolygon);
                $('#modal').modal('show');
            }).catch(function (err) {
                console.log('Fetch Error', err);
            });
        }

    });

    client.addLayers([delegacionesLayer]);
    client.getLeafletLayer().addTo(map);
    //jsRemoveWindowLoad();
    //hideSpinner();
}
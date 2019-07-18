window.maps = "";
window.PuntoLoc;

var latLng = new google.maps.LatLng(19.42523, -99.14645);
var sw = new google.maps.LatLng(19.0486327883719, -99.3648434381694);
var ne = new google.maps.LatLng(19.5926458801042, -98.939375606691);

var latlngbound = new google.maps.LatLngBounds(sw,ne);
var mapOptions = {
    center: latLng,
    zoom: 17,
    draggable:true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
}

var geocoder = new google.maps.Geocoder;
var divgle = document.getElementById('googlemap');
var map_google  = new google.maps.Map(divgle, mapOptions);

map_google.fitBounds(latlngbound);
input = document.getElementById('txtDireccion');
var autocomplete = new google.maps.places.Autocomplete(input,{
    strictBounds:true
});

autocomplete.setBounds(latlngbound);
autocomplete.bounds = latlngbound
autocomplete.setComponentRestrictions({
    country: 'MX'
});

autocomplete.addListener('place_changed', function() {
    var place = autocomplete.getPlace();
    var lendireccion = place.address_components.length;
    if (!place.geometry) {
        return;
    }
    var ptPoint = L.latLng(place.geometry.location.lat(),place.geometry.location.lng());
    //window.maps.setView(ptPoint, 20);
    map.setView(ptPoint, 20);
    CreaPuntoLoc(place.geometry.location.lat(), place.geometry.location.lng());
    var address = '';
    if (place.address_components) {
        address = [
            (place.address_components[0] && place.address_components[0].short_name || ''),
            (place.address_components[1] && place.address_components[1].short_name || ''),
            (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
    }
    $("#txtDireccion").val('');
});

function CreaPuntoLoc(lat, lon){
	if (typeof PuntoLoc !== 'undefined') {  //si el punto ya existe
		PuntoLoc.setLatLng(L.latLng(lat,lon));
	return;
	}

  var ptPoint = L.latLng(lat,lon);
  //PuntoLoc = L.marker(ptPoint).addTo(maps);
  PuntoLoc = L.marker(ptPoint).addTo(map);
}
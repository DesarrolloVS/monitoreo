/*
$test = $('.test');
$test2 = $('.test2');
$test.on('click', function () {
    vehiculosLayer.hide();    
});

setTimeout(function () {
    fnSeteaIds();
}, '1500');
seteaGenerals();
*/

$geocerca = $('#geo_cerca');
$pControl = $('#control_punto');

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

$geocerca.on('click',function(){
    const polygonDrawer = new L.Draw.Polyline(map);
    polygonDrawer.enable();
});

$pControl.on('click',function(){
    const markerDrawer = new L.Draw.Marker(map);
    markerDrawer.enable();
});
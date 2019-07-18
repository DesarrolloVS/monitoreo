const delegacionesStyle0 = `       
#basedel{
    polygon-fill: #d5e8eb;
    polygon-opacity: 0.2;
    line-color: #333;
    line-width: 0.4;
    line-opacity: 1;
}
#basedel::labels {
    text-name: [nombre];
    text-face-name: 'Lato Bold';
    text-size: 12;
    text-label-position-tolerance: 10;
    text-fill: #55555d;
    text-halo-fill: #FFFFFF;
    text-halo-radius: 1;
    text-dy: -10;
    text-allow-overlap: false;
    text-placement: point;
    text-placement-type: simple;
}`;
const delegacionesSource0 = `SELECT * FROM ${capaDelegaciones}`;
//CAPA DELEGACIONES
const delegacionesSource = new carto.source.SQL(delegacionesSource0);
const delegacionesStyle = new carto.style.CartoCSS(delegacionesStyle0);
const delegacionesLayer = new carto.layer.Layer(delegacionesSource,delegacionesStyle);
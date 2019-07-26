<?php

switch ($corde->type) {
    case 'Point':
        $strsqlinsert = "INSERT INTO " . DATASET_POINT . " (the_geom ,description, name, id_obra, selectdatamap, id_expediente, desc_expediente, cuenta_predial, status) "
            . "VALUES (ST_SetSRID(ST_GeomFromGeoJSON('" . $coordenadas . "'),4326),'" . 'test-description' . "','" . 'test-name' . "', " . $idobra . ", " . $selectdatamap . ", " . $idexpediente . ", '" . $desc_expediente . "',"
            . " '" . $cpredial . "', " . $status . ")";


        break;
    case 'LineString':
        $strsqlinsert = "INSERT INTO " . DATASET_POLYLINE . " (the_geom ,description, name, id_obra, selectdatamap, id_expediente, desc_expediente, cuenta_predial, status) "
            . "VALUES (ST_SetSRID(ST_GeomFromGeoJSON('" . $coordenadas . "'),4326),'" . 'test-description' . "','" . 'test-name' . "', " . $idobra . ", " . $selectdatamap . ", " . $idexpediente . ", '" . $desc_expediente . "',"
            . " '" . $cpredial . "', " . $status . ")";
        break;
    case 'Polygon':
        $strsqlinsert = "INSERT INTO " . DATASET_POLYGON . " (the_geom ,description, name, id_obra, selectdatamap, id_expediente, desc_expediente, cuenta_predial, status) "
            . "VALUES (ST_SetSRID(ST_GeomFromGeoJSON('" . $coordenadas . "'),4326),'" . 'test-description' . "','" . 'test-name' . "', " . $idobra . ", " . $selectdatamap . ", " . $idexpediente . ", '" . $desc_expediente . "',"
            . " '" . $cpredial . "', " . $status . ")";
        break;
    default:
        $respuesta->mensaje_carto = "Geometria invalida.";
        $respuesta->codigo_carto = 0;
        return $respuesta;
        break;
}

/*

POINT(0 0 0)
LINESTRING(0 0,1 1,1 2)
POLYGON((0 0 0,4 0 0,4 4 0,0 4 0,0 0 0),(1 1 0,2 1 0,2 2 0,1 2 0,1 1 0))
MULTIPOINT(0 0 0,1 2 1)
MULTILINESTRING((0 0 0,1 1 0,1 2 1),(2 3 1,3 2 1,5 4 1))
MULTIPOLYGON(((0 0 0,4 0 0,4 4 0,0 4 0,0 0 0),(1 1 0,2 1 0,2 2 0,1 2 0,1 1 0)),((-
1 -1 0,-1 -2 0,-2 -2 0,-2 -1 0,-1 -1 0)))
GEOMETRYCOLLECTION(POINT(2 3 9),LINESTRING((2 3 4,3
*/
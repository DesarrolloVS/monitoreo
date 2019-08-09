<?php
function estatus_cliente($param){
    switch ($param) {
        case "":
        $res = "SIN ESTADO";
        break;
        default:
        $res = "NO ENCONTRADO";
    }
    return $res;
}

function estatus_turno($param){
    switch ($param) {
        case "":
        $res = "SIN ESTADO";
        break;
        default:
        $res = "NO ENCONTRADO";
    }
    return $res;
}

function estatus_responsable($param){
    switch ($param) {
        case "":
        $res = "SIN ESTADO";
        break;
        default:
        $res = "NO ENCONTRADO";
    }
    return $res;
}

function estatus_gps($param){
    switch ($param) {
        case "":
        $res = "SIN ESTADO";
        break;
        default:
        $res = "NO ENCONTRADO";
    }
    return $res;
}
?>
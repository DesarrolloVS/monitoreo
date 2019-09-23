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

function estatus_vehiculos($param){
    switch ($param) {
        case "":
        $res = "SIN ESTADO";
        break;
        default:
        $res = "NO ENCONTRADO";
    }
    return $res;
}

function tipoAlerta($param){
    switch ($param) {
        case "1":
        $res = "ALERTA VERDE";
        break;
        case "2":
        $res = "ALERTA AMARILLA";
        break;
        case "3":
        $res = "ALERTA ROJA";
        break;
        default:
        $res = "NO ENCONTRADO";
    }
    return $res;
}

function tipoDato($param){
    switch ($param) {
        case "1":
        $res = "ENTERO";
        break;
        case "2":
        $res = "DECIMAL";
        break;
        case "3":
        $res = "FECHA";
        break;
        case "4":
        $res = "BOOLEAN";
        break;
        case "5":
        $res = "CADENA";
        break;
        default:
        $res = "NO ENCONTRADO";
    }
    return $res;
}

function fnValor($param){
    switch ($param) {
        case "1":
        $res = "ventero";
        break;
        case "2":
        $res = "vdecimal";
        break;
        case "3":
        $res = "vfecha";
        break;
        case "4":
        $res = "vbooleano";
        break;
        case "5":
        $res = "vcadena";
        break;
        default:
        $res = "NO ENCONTRADO";
    }
    return $res;
}
?>
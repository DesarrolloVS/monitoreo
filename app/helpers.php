<?php
function getB64Image($base64_image)
{
    // Obtener el String base-64 de los datos
    $image_service_str = substr($base64_image, strpos($base64_image, ",") + 1);
    // Decodificar ese string y devolver los datos de la imagen
    $image = base64_decode($image_service_str);
    // Retornamos el string decodificado
    return $image;
}

function getB64Extension($base64_image, $full = null)
{
    // Obtener mediante una expresión regular la extensión imagen y guardarla
    // en la variable "img_extension"
    preg_match("/^data:image\/(.*);base64/i", $base64_image, $img_extension);
    // Dependiendo si se pide la extensión completa o no retornar el arreglo con
    // los datos de la extensión en la posición 0 - 1
    return ($full) ?  $img_extension[0] : $img_extension[1];
}

function estatus_usuario($param){
    switch ($param) {
        case "":
        $res = "SIN ESTADO";
        break;
        case "1":
        $res = "NUEVO REGISTRO";
        break;
        case "2":
        $res = "ACTIVO";
        break;
        case "3":
        $res = "INACTIVO";
        break;
        default:
        $res = "BAJA";
    }
    return $res;
}

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

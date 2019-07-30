<?php
function estatus_cliente($param){
    switch ($param) {
        case "":
        $res = "SIN PERFIL";
        break;
        default:
        $res = "NO ENCONTRADO";
    }
    return $res;
}
?>
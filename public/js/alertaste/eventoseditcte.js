$(document).ready(function () {

    $tcf = $('#tipoconfiguracion_id');
    $psn = $('#parametro_sn');
    $tipo_conf = $('#tipoconfiguracion_id').val();
    $vpsn0 = $('#parametro_sn:checked').val();

    if ($tipo_conf == "1") {
        $('#fid_tipoveh').hide();
        $('#fi_campocond').hide();
        $('#fi_repetir').hide();
        $('#fi_valor').hide();
        $('#fi_parametro').hide();
        $('#fi_parametrosn').hide();
    } else if ($tipo_conf == "2") {
        $('#fid_tipoveh').hide();
        $('#fi_campocond').hide();
        $('#fi_repetir').show();
        $('#fi_valor').show();
        $('#fi_parametro').hide();
        $('#fi_parametrosn').show();
    } else if ($tipo_conf == "3" || $tipo_conf == "4" || $tipo_conf == "5" || $tipo_conf == "6") {
        $('#fid_tipoveh').show();
        $('#fi_campocond').hide();
        $('#fi_repetir').show();
        $('#fi_valor').show();
        $('#fi_parametro').hide();
        $('#fi_parametrosn').show();
    } else if ($tipo_conf == "7" || $tipo_conf == "8" || $tipo_conf == "9" || $tipo_conf == "10") {
        $('#fid_tipoveh').hide();
        $('#fi_campocond').show();
        $('#fi_repetir').hide();
        $('#fi_valor').hide();
        $('#fi_parametro').hide();
        $('#fi_parametrosn').hide();
    }
    if ($tipo_conf == "1" && $vpsn0 == "1") {
        $('#fi_parametro').hide();
        $('#fi_valor').hide();
    } else if ($tipo_conf == "2" && $vpsn0 == "1") {
        $('#fi_parametro').show();
        $('#fi_valor').hide();
    } else if (($tipo_conf == "3" || $tipo_conf == "4" || $tipo_conf == "5" || $tipo_conf == "6") && $vpsn0 == "1") {
        $('#fi_parametro').show();
        $('#fi_valor').hide();
    }


    if ($tipo_conf == "1" && $vpsn0 != "1") {
        $('#fi_parametro').hide();
        $('#fi_valor').hide();
    } else if ($tipo_conf == "2" && $vpsn0 != "1") {
        $('#fi_parametro').hide();
        $('#fi_valor').show();
    } else if (($tipo_conf == "3" || $tipo_conf == "4" || $tipo_conf == "5" || $tipo_conf == "6") && $vpsn0 != "1") {
        $('#fi_parametro').hide();
        $('#fi_valor').show();
    }

    $psn.on('change', function () {
        $vpsn = $('#parametro_sn:checked').val();
        $valor_tc2 = $('#tipoconfiguracion_id').val();
        if ($valor_tc2 == "1" && $vpsn== "1") {
            $('#fi_parametro').hide();
            $('#fi_valor').hide();
        } else if ($valor_tc2 == "2" && $vpsn== "1") {
            $('#fi_parametro').show();
            $('#fi_valor').hide();
        } else if (($valor_tc2 == "3" || $valor_tc2 == "4" || $valor_tc2 == "5" || $valor_tc2 == "6") && $vpsn== "1") {
            $('#fi_parametro').show();
            $('#fi_valor').hide();
        }else{
            $('#fi_parametro').hide();
            $('#fi_valor').show();
        }
    });
});
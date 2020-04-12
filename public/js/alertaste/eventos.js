$(document).ready(function () {
        $tcf = $('#tipoconfiguracion_id');
        $psn = $('#parametro_sn');
        $tipo_conf = $('#tipoconfiguracion_id').val();

    $tcf.on('change', function () {
        $valor_tc = $('#tipoconfiguracion_id').val();
        if ($valor_tc == "1") {
            $('#fid_tipoveh').hide();
            $('#fi_campocond').hide();
            $('#fi_repetir').hide();
            $('#fi_valor').hide();
            $('#fi_parametro').hide();
            $('#fi_parametrosn').hide();
        } else if ($valor_tc == "2") {
            $('#fid_tipoveh').hide();
            $('#fi_campocond').hide();
            $('#fi_repetir').show();
            $('#fi_valor').show();
            $('#fi_parametro').hide();
            $('#fi_parametrosn').show();
        } else if ($valor_tc == "3" || $valor_tc == "4" || $valor_tc == "5" || $valor_tc == "6") {
            $('#fid_tipoveh').show();
            $('#fi_campocond').hide();
            $('#fi_repetir').show();
            $('#fi_valor').show();
            $('#fi_parametro').hide();
            $('#fi_parametrosn').show();
        } else if ($valor_tc == "7" || $valor_tc == "8" || $valor_tc == "9" || $valor_tc == "10") {
            $('#fid_tipoveh').hide();
            $('#fi_campocond').show();
            $('#fi_repetir').hide();
            $('#fi_valor').hide();
            $('#fi_parametro').hide();
            $('#fi_parametrosn').hide();
        }
    });


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
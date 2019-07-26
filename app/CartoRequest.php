<?php namespace App;

//use GuzzleHttp\Client;
use App\Exceptions\CartoRequestException;

class CartoRequest
{
    public function curlSQLCarto($sql) {
        
        $API_KEY = "55a0b774e323959cd74d3e6fabbc59bd95357230";
        $url = "https://cdmx-partner.carto.com/api/v2/sql";
        $ch = curl_init();
        curl_setopt_array($ch, array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_URL => $url,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => array(
                    "api_key" => $API_KEY,
                    "q" => $sql)
            )
        );
        $result = curl_exec($ch);
        $r = json_decode($result,true);

        if (!$result) {
            $response['codigo'] = 0;
            $response['mensaje'] = "Ocurrio un error con la funcion CURL";
        }  else {
            if(isset($r['error'])){
                $response['codigo'] = 0;
                $response['mensaje'] = $r['error'][0];
            }elseif(isset($r['total_rows'])){
                $response['codigo'] = 1;
                $response['mensaje'] = "Se registro correctamente el vector.";
            }
        }
        
        curl_close($ch);
        return $response;
    }
}

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
        if (!$result) {
            $rst = array("error" => curl_errno($ch), "Msg" => curl_errno($ch));
        }  else {
            $rst = json_decode($result, true);
        }
        curl_close($ch);
        return $rst;
    }
}

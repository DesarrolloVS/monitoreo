<?php

namespace App\Http\Controllers;
use App\CartoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormsController extends Controller
{
    public function form_geocerca(){
        return view('forms/form_geocerca');
    }

    public function registrar_geocerca(Request $request){   
        $descripcion_geocerca = strtoupper($request->get('descripcion_geocerca'));
        $tipo_geocerca = $request->get('tipo_geocerca');
        $latitud = $request->get('latitud');
        $longitud = $request->get('longitud');
        $coor = $latitud = $request->get('coor');
        $coor_polygon = $latitud = $request->get('coor_polygon');
        //$geom = "ST_GeomFromGeoJSON('".$coor."')";
        $geom = "ST_SetSRID(ST_GeomFromGeoJSON('{$coor}'),4326)";

        $query = "INSERT INTO GEOCERCA (GEOM,DESCRIPCION_GEOCERCA,ID_TIPO_GEOCERCA,COORDENADAS) "  
                ."VALUES({$geom},'{$descripcion_geocerca}',{$tipo_geocerca},'{$coor}')";

        DB::beginTransaction(); 
        DB::statement($query); 
        $id_geocerca = DB::table('geocerca')
        ->max('id_geocerca');

        $query_carto = "INSERT INTO MONITOREO_GEOCERCAS "
                      ."(THE_GEOM,ID_GEOCERCA,DESCRIPCION_GEOCERCA,ID_TIPO_GEOCERCA) "
                      ."VALUES({$geom},{$id_geocerca},'{$descripcion_geocerca}',{$tipo_geocerca})";


        $carto = new CartoRequest();
        try {
            $json = $carto->curlSQLCarto($query_carto);
        } catch (CartoRequestException $exception) {
            $json = $exception->getMessage();
            exit();
        }
        
        if($json['codigo'] == 1){
            DB::commit();
        }
        
        echo json_encode($json);
        
        



        



        
    }
}

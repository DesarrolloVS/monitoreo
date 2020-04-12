<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mon_pos_ultima;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

  //  Indispensable: https://packagist.org/packages/gonoware/laravel-maps


class MondadminController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('roles:admin,superuser');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response


     */
    public function index()
    {

    }

    public function mapa()
    {
        $capa= Mon_pos_ultima::all();
        foreach ($capa as $id => $punto) {
            $cadapunto[] = array(
                'title' => $punto->gps_utc_time,
                'lat' => $punto->latitude,
                'lng' => $punto->longitude,
                'popup' =>  '<strong>Details</strong><p>Modelo: '.$punto->modelo_gps.' Imei :'.$punto->imei.'</p>'
            );
        }

        $puntos =array (
            'lat' => 19.402187,
            'lng' => -99.127482,
            'zoom' => 10,
            'markers' => $cadapunto
        );

        //dd($puntos);
        return view('monadmin.mapa')->with('puntos', $puntos);
    }

    public function listalertas()
    {

        $alertas_cvg = DB::table('reg_alertas_gps_cte_vehi as rac')
                ->leftJoin('alertasclientes as ac', 'rac.id_alerta', '=', 'ac.id')
                ->select('rac.tipo_registro', 'rac.id_alerta', 'rac.activo', 'rac.valor_actual', 'rac.valor_nuevo', 'rac.fyh_actual', 'rac.fyh_nuevo', 'rac.mostrar',  'rac.alerta', 'rac.cliente_id', 'rac.gps_id', 'rac.vehiculo_id', 'ac.tipoconfiguracion_id')
                ->orderBy('rac.id_alerta', 'asc')
                ->get();

        //dd($alertas_cvg);
        return view('monadmin.listalertas', [
            'alertas_cvg' => $alertas_cvg
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('map.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $map = new Map;
        $map->user_id = Auth::user()->id;
        $map->category_id = $request->category;
        $map->description = $request->description;
        $map->title = $request->title;
        $map->address = $request->location;
        $map->radius = $request->radius;
        $map->latitude = $request->lat;
        $map->longitude = $request->long;
        $map->save();

        return redirect()->action('MapController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function show(Map $map)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function edit(Map $map)
    {
        $category = Category::all();
        return view('map.edit', compact('map', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Map $map)
    {
        $map->user_id   = Auth::user()->id;
        $map->category_id = $request->category;
        $map->description = $request->description;
        $map->title     = $request->title;
        $map->address   = $request->location;
        $map->radius    = $request->radius;
        $map->latitude  = $request->lat;
        $map->longitude = $request->long;
        $map->save();

        return redirect()->action('MapController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function destroy(Map $map)
    {
        $map->delete();

        return redirect()->action('MapController@index');
    }
}

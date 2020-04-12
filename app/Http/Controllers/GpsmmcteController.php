<?php

namespace App\Http\Controllers;

use App\Alertascliente;
use App\Cliente;
use App\Gpsalerta;
use App\Gpsmarcamodelo;
use App\Gpsmarcamodelocte;
use App\Parametroscliente;
use App\Tipogravedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GpsmmcteController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('accesous: 1, 1, 2,admin,superuser');
        //$this->middleware('roles:admin,superuser');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.gpsmarcamodelo.index', [
            'gps' => Gpsmarcamodelo::all()->sortBy("id")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cliente = Cliente::findOrFail($id);
        $gpsmm = Gpsmarcamodelo::all();

        return view('catalogos.gpsmmcte.create', [
            'cliente' => $cliente,
            'gpsmm' => $gpsmm
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         request()->validate([
            'id_cliente' => 'required',
            'gpsmarcamodelo_id' => 'required'
        ]);
        DB::beginTransaction();
            $gpsmarcamodeloctes = new Gpsmarcamodelocte();
            $gpsmarcamodeloctes->cliente_id = $request->get('id_cliente');
            $gpsmarcamodeloctes->gpsmarcamodelo_id = $request->get('gpsmarcamodelo_id');
            $gpsmarcamodeloctes->save();
        DB::commit();
        return redirect("/cat_clientes/".$request->get('id_cliente')."/gpsmmcte");
    }

    public function alertascte($id)
    {
        $gpsmmcte = Gpsmarcamodelocte::findOrFail($id);
        $cliente_id =$gpsmmcte->cliente_id;
        $gpsmarcamodelo_id = $gpsmmcte->gpsmarcamodelo_id;
        $cliente = Cliente::findOrFail($cliente_id);
        $alertasmmcte = Alertascliente::where('cliente_id',$cliente_id)
        ->where('gpsmarcamodelo_id', $gpsmarcamodelo_id)
        ->orderBy('id', 'ASC')
        ->get();

        return view('catalogos.gpsmmcte.alertascte', [
            'gpsmmcte' => $gpsmmcte,
            'cliente' => $cliente,
            'alertasmmcte' => $alertasmmcte
        ]);
    }

    public function alertasctecreate($id)
    {
        $gpsmmcte = Gpsmarcamodelocte::findOrFail($id);
        $cliente_id =$gpsmmcte->cliente_id;
        $gpsmarcamodelo_id = $gpsmmcte->gpsmarcamodelo_id;

        $cliente = Cliente::findOrFail($cliente_id);

        $alertasmmcte = Alertascliente::where('cliente_id',$cliente_id)
        ->where('gpsmarcamodelo_id', $gpsmarcamodelo_id)
        ->get();

        $alertasmm = Gpsalerta::where('gpsmarcamodelo_id', '=', $gpsmarcamodelo_id)->get();
        $conacte = $alertasmmcte->count();

        if ($conacte == 0) {
            DB::beginTransaction();
            foreach ($alertasmm as $alertasx) {
                $x = new Alertascliente();
                $x->gpsalerta_id = $alertasx->id;
                $x->cliente_id = $cliente_id;
                $x->gpsmarcamodelo_id = $alertasx->gpsmarcamodelo_id;
                $x->desc_corta = $alertasx->desc_corta;
                $x->descripcion = $alertasx->descripcion;
                $x->tipoconfiguracion_id = $alertasx->tipoconfiguracion_id;
                $x->camposgps_id = $alertasx->camposgps_id;
                $x->repetir = $alertasx->repetir;
                $x->parametros_id = $alertasx->parametros_id;
                $x->pov = $alertasx->pov;
                $x->valor = $alertasx->valor;
                $x->tipovehiculo_id = $alertasx->tipovehiculo_id;
                $x->campos_condicion = $alertasx->campos_condicion;
                $x->estado = $alertasx->estado;
                $x->tipogravedad_id = 1;
                $x->save();
            }
            DB::commit();
        } else {
            foreach ($alertasmm as $alertasx) {
                $alertasmmcte1 = DB::table('alertasclientes')
                ->where('gpsalerta_id',$alertasx->id)
                ->where('gpsmarcamodelo_id', $alertasx->gpsmarcamodelo_id)
                ->where('cliente_id', $cliente_id)
                ->get();
                $conexcte = $alertasmmcte1->count();
                if ($conexcte == 0) {
                    $x = new Alertascliente();
                    $x->cliente_id = $cliente_id;
                    $x->gpsalerta_id = $alertasx->id;
                    $x->gpsmarcamodelo_id = $alertasx->gpsmarcamodelo_id;
                    $x->desc_corta = $alertasx->desc_corta;
                    $x->descripcion = $alertasx->descripcion;
                    $x->tipoconfiguracion_id = $alertasx->tipoconfiguracion_id;
                    $x->camposgps_id = $alertasx->camposgps_id;
                    $x->repetir = $alertasx->repetir;
                    $x->parametros_id = $alertasx->parametros_id;
                    $x->pov = $alertasx->pov;
                    $x->valor = $alertasx->valor;
                    $x->tipovehiculo_id = $alertasx->tipovehiculo_id;
                    $x->campos_condicion = $alertasx->campos_condicion;
                    $x->estado = $alertasx->estado;
                    $x->tipogravedad_id = 1;
                    $x->save();
                }
            }
        }
        return redirect("/cat_gpsmmcte/".$id."/alertascte");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function alertascteedit($id)
    {
        //dd($id);
        $alertammcte = Alertascliente::findOrFail($id);
        $cliente_id =$alertammcte->cliente_id;
        $gpsmarcamodelo_id = $alertammcte->gpsmarcamodelo_id;

        $cliente = Cliente::findOrFail($cliente_id);
        $gpsmmcte = Gpsmarcamodelo::findOrFail($gpsmarcamodelo_id);
        $parametros = Parametroscliente::where('cliente_id',$cliente_id)->get();

        return view('catalogos.gpsmmcte.alertascteedit', [
            'gpsmmcte' => $gpsmmcte,
            'cliente' => $cliente,
            'alertammcte' => $alertammcte,
            'parametros' => $parametros,
            'gpsmarcamodelo_id' => $gpsmarcamodelo_id,
            'tipogravedad' => Tipogravedad::all()
        ]);

    }


    public function alertascteupd(Request $request, $id)
    {
        //dd($id);
        //dd($request);
        if ($request->get('tipoconfiguracion_id') == null)
        {
            return redirect("/cat_gpsmmcte/".$request->get('gpsmarcamodelo_id')."/alertascte");
        }

        $tipoconf_v = $request->get('tipoconfiguracion_id');

        if($tipoconf_v == 1 or $tipoconf_v == 7){
            request()->validate([
                'gravedad_id' => 'required'
            ]);
        }

        if($tipoconf_v == 2){
            if($request->get('parametro_sn') == 1){ //parametro = si
                request()->validate([
                    'repetir' => 'required',
                    'parametros_id' => 'required',
                    'gravedad_id' => 'required'
                ]);
            }else{
                request()->validate([
                    'repetir' => 'required',
                    'valor' => 'required',
                    'gravedad_id' => 'required'
                ]);
            }
        }elseif($tipoconf_v == 3 or $tipoconf_v == 4 or $tipoconf_v == 5  or $tipoconf_v == 6){
            if($request->get('parametro_sn') == 1){ //parametro = si
                request()->validate([
                    'repetir' => 'required',
                    'parametros_id' => 'required',
                    'gravedad_id' => 'required'
                ]);
            }else
            {
                request()->validate([
                    'repetir' => 'required',
                    'valor' => 'required',
                    'gravedad_id' => 'required'
                ]);
            }

        }elseif($tipoconf_v == 7 or $tipoconf_v == 8 or $tipoconf_v == 9 or $tipoconf_v == 10){
            request()->validate([
                'campo_cond' => 'required',
                'gravedad_id' => 'required'
            ]);
        }

        DB::beginTransaction();
            $x = Alertascliente::findOrFail($id);
            // tipo (2)
            if($tipoconf_v == 2 or $tipoconf_v == 3 or $tipoconf_v == 4 or $tipoconf_v == 5 or $tipoconf_v == 6){
                $x->repetir = $request->get('repetir');
                if($request->get('parametro_sn') == 1){ //parametro = si
                    $x->parametros_id = $request->get('parametros_id');
                    $x->pov = true;
                    $x->valor = null;

                }else{
                    $x->valor = strtoupper($request->get('valor'));
                    $x->pov = false;
                    $x->parametros_id = null;
                }
            }
            if($tipoconf_v == 8 or $tipoconf_v == 9 or $tipoconf_v == 10){
                $x->campos_condicion = strtoupper($request->get('campo_cond'));
            }
            $x->tipogravedad_id = $request->get('gravedad_id');
            $x->save();
        DB::commit();

        return redirect("/cat_gpsmmcte/".$request->get('gpsmarcamodelo_id')."/alertascte");
    }

    public function estatus($id)
    {
        $alertammcte = Alertascliente::findOrFail($id);
        $cliente_id =$alertammcte->cliente_id;
        $gpsmarcamodelo_id = $alertammcte->gpsmarcamodelo_id;

        $cliente = Cliente::findOrFail($cliente_id);
        $gpsmmcte = Gpsmarcamodelocte::findOrFail($gpsmarcamodelo_id);

        return view('catalogos.gpsmmcte.estatus', [
            'gpsmmcte' => $gpsmmcte,
            'cliente' => $cliente,
            'gac' => $alertammcte,
            'gpsmarcamodelo_id' => $gpsmarcamodelo_id
        ]);
    }

    public function estatusupd(Request $request, $id)
    {
        request()->validate([
            'estadoalerta' => 'required'
        ]);
        $alertammcte = Alertascliente::findOrFail($id);
        $gpsmarcamodelo_id = $alertammcte->gpsmarcamodelo_id;

        $alertammcte->estado = $request->get('estadoalerta');
        $alertammcte->save();

        return redirect("/cat_gpsmmcte/".$gpsmarcamodelo_id."/alertascte");
    }

}

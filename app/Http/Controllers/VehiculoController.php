<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Marca;
use App\Submarca;
use App\Modelo;
use App\Procedencia;
use App\Tipovehiculo;
use App\Tipouso;
use App\Tipocombustible;
use App\Tipotransmision;
use App\Clasevehiculo;
use App\Estadovehiculo;
use App\Vehiculo;
use App\Vehiculogpshistorico;
use App\Gpscliente;
use App\Responsablesvehiculo;
use App\Responsablesvehiculoh;
use App\Responsablevehiculo;
use Illuminate\Support\Facades\DB;

class VehiculoController extends Controller
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

    public function index($cliente_id = "")
    {
        if($cliente_id != 0){
            $cliente = Cliente::findorFail($cliente_id);
            $nombre = $cliente->nombre;
            $vehiculos = Vehiculo::where('cliente_id',$cliente_id)->get();
        }else{
            $cliente_id = "";
            $nombre = "";
            $vehiculos = Vehiculo::all();
        }

        return view('vehiculos.vehiculos.index', [
            'clientes' => Cliente::all(),
            'cliente_id' => $cliente_id,
            'nombre' => $nombre,
            'vehiculos' => $vehiculos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('vehiculos.vehiculos.create', [
    //         'clientes' => Cliente::all(),
    //         'marcas' => Marca::all(),
    //         'submarcas' => Submarca::all(),
    //         'modelos' => Modelo::all(),
    //         'procedencias' => Procedencia::all(),
    //         'tvs' => Tipovehiculo::all(),
    //         'tus' => Tipouso::all(),
    //         'tcs' => Tipocombustible::all(),
    //         'tts' => Tipotransmision::all(),
    //         'cvs' => Clasevehiculo::all()
    //     ]);
    // }

    public function create($id)
    {

        $cliente = Cliente::findorFail($id);
        $nombre = $cliente->nombre;
        $tvs = Tipovehiculo::where('id', '<', 99)->get();

        $c = Cliente::findOrFail($id );
        return view('catalogos.vehiculoscte.create', [
            'cliente_id' => $id,
            'clientes' => Cliente::all(),
            'cliente' => $c,
            'tvs' => $tvs,
            'nombre' => $nombre
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
        //dd($request);

        request()->validate([
            'descripcion' => 'required',
            'placa' => 'required',
            'modelo' => 'required',
            'tipovehiculo_id' => 'required'
        ]);

        $vehiculo = new Vehiculo();
        $vehiculo->cliente_id = $request->get('id_cliente');
        $vehiculo->descripcion = strtoupper($request->get('descripcion'));
        $vehiculo->placa = strtoupper($request->get('placa'));
        $vehiculo->modelo = strtoupper($request->get('modelo'));
        $vehiculo->tipovehiculo_id = $request->get('tipovehiculo_id');
        $vehiculo->marca = strtoupper($request->get('marca'));
        $vehiculo->submarca = strtoupper($request->get('submarca'));
        $vehiculo->serie = strtoupper($request->get('serie'));
        $vehiculo->color = strtoupper($request->get('color'));
        $vehiculo->save();
    return redirect("/cat_clientes/".$request->get('id_cliente')."/vehiculoscte");

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $cliente)
    {
        $client = Cliente::findorFail($cliente);
        $nombre = $client->nombre;
        $v = Vehiculo::findOrFail($id);
        $tvs = Tipovehiculo::where('id', '<', 99)->get();

        return view('catalogos.vehiculoscte.edit', [
            'clientes' => Cliente::all(),
            'tvs' => $tvs,
            'v' => $v,
            'cliente_id' => $cliente,
            'nombre' => $nombre
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'descripcion' => 'required',
            'placa' => 'required',
            'modelo' => 'required',
            'tipovehiculo_id' => 'required'
        ]);

        $vehiculo = Vehiculo::findOrFail($id);
        //$vehiculo->cliente_id = $request->get('id_cliente');
        $vehiculo->descripcion = strtoupper($request->get('descripcion'));
        $vehiculo->marca = strtoupper($request->get('marca'));
        $vehiculo->submarca = strtoupper($request->get('submarca'));
        $vehiculo->placa = strtoupper($request->get('placa'));
        $vehiculo->modelo = strtoupper($request->get('modelo'));
        $vehiculo->serie = strtoupper($request->get('serie'));
        $vehiculo->tipovehiculo_id = $request->get('tipovehiculo_id');
        $vehiculo->color = strtoupper($request->get('color'));
        $vehiculo->save();
        return redirect("/cat_clientes/".$request->get('id_cliente')."/vehiculoscte");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $v = Vehiculo::findOrFail($id);
        $v->delete();
        return redirect()->route('cat_vehiculos.indexx',['id' => $request->get('id_cliente')]);
    }

    public function submarca(Request $request)            //ELIMINA EL ELEMENTO
    {
        $id_marca = $request->get('id_marca');
        $subs = Submarca::where('marca_id','=',$id_marca)->get();

        return view('catalogos.vehiculoscte.submarca',[
            'submarcas' => $subs
        ]);
    }

    public function confirmDelete($id,$cliente)            //ELIMINA EL ELEMENTO
    {
        $v = Vehiculo::findOrFail($id);
        return view('catalogos.vehiculoscte.confirmDelete',[
            'v' => $v,
            'cliente_id' => $cliente
        ]);
    }

    public function estatus($id, $cliente)
    {
        $v = Vehiculo::findOrFail($id);
        return view('catalogos.vehiculoscte.estatus', [
            'v' => $v,
            'estados' => Estadovehiculo::all(),
            'cliente' => $cliente
        ]);
    }

    public function update_estatus(Request $request, $id)
    {
        request()->validate([
            'estadovehiculo_id' => 'required'
        ]);
        $v = Vehiculo::findOrFail($id);
        $v->estadovehiculo_id = $request->get('estadovehiculo_id');
        $v->save();
        return redirect("/cat_clientes/".$request->get('id_cliente')."/vehiculoscte");
    }

    public function gps($id, $cliente)
    {
        $v = Vehiculo::findOrFail($id);
        $id_vehiculo = $v->id;
        $historico = DB::table('vehiculogpshistoricos')
        ->where('vehiculo_id',$id_vehiculo)
        ->get();
        $c = Cliente::findOrFail($v->cliente_id);
        if($historico->first()){$bandera2 = 1;}else{$bandera2 = 0;}

        $gpss = DB::table('gpsclientes')
        ->where('cliente_id',$v->cliente_id)
        ->whereIn('asignado', [false])
        ->get();            //dd($doms);

        //if($gpss->first()){$bandera = 1;}else{$bandera = 0;}


        return view('catalogos.vehiculoscte.gps', [
            'v' => $v,
            'cliente' => $c,
            'historico' => $historico,
            'gpss' => $gpss
            // 'bandera' => $bandera
        ]);
    }

    public function showgpss(Request $request)            //ELIMINA EL ELEMENTO
    {
        //dd($request);
        $id_cliente = $request->get('id_cliente');
        $gpss = DB::table('gpsclientes')
        ->where('cliente_id',$id_cliente)
        ->whereIn('asignado', [false])
        ->get();            //dd($doms);

        if($gpss->first()){$bandera = 1;}else{$bandera = 0;}

        return view('catalogos.vehiculoscte.gpss', [
            'gpss' => $gpss,
            'bandera' => $bandera
        ]);
    }

    public function update_gps(Request $request, $id, $cliente)
    {
        //dd($cliente);
        $gpscliente_id = $request->get('gpscliente_id');
        $gpscliente_idanterior = $request->get('gpscliente_id_anterior');
        DB::beginTransaction();
        $v = Vehiculo::findOrFail($id);
        $v->gpscliente_id  = $gpscliente_id;
        $v->save();

        $g = Gpscliente::findOrFail($gpscliente_id);
        $imei = $g->imei;
        $serie = $g->serie;
        $g->asignado = true;
        $g->save();

        if($gpscliente_idanterior != null){
            $g2 = Gpscliente::findOrFail($gpscliente_idanterior);
            $g2->asignado = false;
            $g2->save();}


        $h = new Vehiculogpshistorico();
        $h->vehiculo_id = $request->get('vehiculo_id');
        $h->gpscliente_id = $request->get('gpscliente_id');
        $h->placa = strtoupper($request->get('placa'));
        $h->serie = $imei;
        $h->imei = $serie;
        $new_cliente = $cliente;
        $c = Cliente::findOrFail($new_cliente);
        $cliente_nombre = $c->nombre;
        $h->cliente_nombre = $cliente_nombre;
        $h->cliente_id = $new_cliente;
        $h->save();
        DB::commit();
        return redirect("/cat_clientes/".$cliente."/vehiculoscte");
    }

    public function historico($id)
    {
        $v = Vehiculo::findOrFail($id);
        $cliente= $v->cliente_id;
        $historico = DB::table('vehiculogpshistoricos')
        ->where('vehiculo_id',$id)
        ->get();

        return view('catalogos.vehiculoscte.historicogps', [
            'v' => $v,
            'historico' => $historico,
            'cliente' => $cliente
        ]);
    }

    public function nogps($id)
    {
        DB::beginTransaction();
        $v = Vehiculo::findOrFail($id);
        $cliente= $v->cliente_id;
        $gpscliente_id = $v->gpscliente_id;
        $v->gpscliente_id = null;
        $v->save();

        $g = Gpscliente::findOrFail($gpscliente_id);
        $g->asignado = false;
        $g->save();
        DB::commit();
        return redirect("/cat_clientes/".$cliente."/vehiculoscte");
    }


}
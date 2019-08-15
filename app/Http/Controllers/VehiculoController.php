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
use App\vehiculogpshistorico;
use App\Gpscliente;
use Illuminate\Support\Facades\DB;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehiculos.vehiculos.index', [
            'vehiculos' => Vehiculo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.vehiculos.create', [
            'clientes' => Cliente::all(),
            'marcas' => Marca::all(),
            'submarcas' => Submarca::all(),
            'modelos' => Modelo::all(),
            'procedencias' => Procedencia::all(),
            'tvs' => Tipovehiculo::all(),
            'tus' => Tipouso::all(),
            'tcs' => Tipocombustible::all(),
            'tts' => Tipotransmision::all(),
            'cvs' => Clasevehiculo::all()
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

        // dd($request);
        $vehiculo = new Vehiculo();
        $vehiculo->cliente_id = $request->get('cliente_id');
        $vehiculo->descripcion = strtoupper($request->get('descripcion'));
        $vehiculo->marca_id = $request->get('marca_id');
        $vehiculo->submarca_id = $request->get('submarca_id');
        $vehiculo->placa = strtoupper($request->get('placa'));
        $vehiculo->modelo_id = $request->get('modelo_id');
        $vehiculo->puertas = $request->get('puertas');
        $vehiculo->cilindros = $request->get('cilindros');
        $vehiculo->serie = strtoupper($request->get('serie'));
        $vehiculo->chasis = strtoupper($request->get('chasis'));
        $vehiculo->capacidad = $request->get('capacidad');
        $vehiculo->procedencia_id = $request->get('procedencia_id');
        $vehiculo->tipovehiculo_id = $request->get('tipovehiculo_id');
        $vehiculo->tipouso_id = $request->get('tipouso_id');
        $vehiculo->tipocombustible_id = $request->get('tipocombustible_id');
        $vehiculo->tipotransmision_id = $request->get('tipotransmision_id');
        $vehiculo->version = strtoupper($request->get('version'));
        $vehiculo->clasevehiculo_id = $request->get('clasevehiculo_id');
        $vehiculo->vin = strtoupper($request->get('vin'));
        $vehiculo->rfv = strtoupper($request->get('rfv'));
        $vehiculo->color = strtoupper($request->get('color'));
        $vehiculo->balizado = $request->get('balizado');
        $vehiculo->save();
        return redirect('/cat_vehiculos');
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
    public function edit($id)
    {
        $v = Vehiculo::findOrFail($id);
        $submarcas = Submarca::where('marca_id','=',$v->marca_id)->get();

        return view('vehiculos.vehiculos.edit', [
            'clientes' => Cliente::all(),
            'marcas' => Marca::all(),
            'submarcas' => $submarcas,
            'modelos' => Modelo::all(),
            'procedencias' => Procedencia::all(),
            'tvs' => Tipovehiculo::all(),
            'tus' => Tipouso::all(),
            'tcs' => Tipocombustible::all(),
            'tts' => Tipotransmision::all(),
            'cvs' => Clasevehiculo::all(),
            'v' => $v
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
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->cliente_id = $request->get('cliente_id');
        $vehiculo->descripcion = strtoupper($request->get('descripcion'));
        $vehiculo->marca_id = $request->get('marca_id');
        $vehiculo->submarca_id = $request->get('submarca_id');
        $vehiculo->placa = strtoupper($request->get('placa'));
        $vehiculo->modelo_id = $request->get('modelo_id');
        $vehiculo->puertas = $request->get('puertas');
        $vehiculo->cilindros = $request->get('cilindros');
        $vehiculo->serie = strtoupper($request->get('serie'));
        $vehiculo->chasis = strtoupper($request->get('chasis'));
        $vehiculo->capacidad = $request->get('capacidad');
        $vehiculo->procedencia_id = $request->get('procedencia_id');
        $vehiculo->tipovehiculo_id = $request->get('tipovehiculo_id');
        $vehiculo->tipouso_id = $request->get('tipouso_id');
        $vehiculo->tipocombustible_id = $request->get('tipocombustible_id');
        $vehiculo->tipotransmision_id = $request->get('tipotransmision_id');
        $vehiculo->version = strtoupper($request->get('version'));
        $vehiculo->clasevehiculo_id = $request->get('clasevehiculo_id');
        $vehiculo->vin = strtoupper($request->get('vin'));
        $vehiculo->rfv = strtoupper($request->get('rfv'));
        $vehiculo->color = strtoupper($request->get('color'));
        $vehiculo->balizado = $request->get('balizado');
        $vehiculo->save();
        return redirect('/cat_vehiculos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $v = Vehiculo::findOrFail($id);
        $v->delete();
        return redirect('/cat_vehiculos');
    }

    public function submarca(Request $request)            //ELIMINA EL ELEMENTO
    {        
        $id_marca = $request->get('id_marca');
        $subs = Submarca::where('marca_id','=',$id_marca)->get();

        return view('vehiculos.vehiculos.submarca',[
            'submarcas' => $subs
        ]);
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $v = Vehiculo::findOrFail($id);
        return view('vehiculos.vehiculos.confirmDelete',[
            'v' => $v
        ]);
    }

    public function estatus($id)
    {        
        $v = Vehiculo::findOrFail($id);
        return view('vehiculos.vehiculos.estatus', [
            'v' => $v,
            'estados' => Estadovehiculo::all()    
        ]);        
    }

    public function update_estatus(Request $request, $id)
    {   
        $v = Vehiculo::findOrFail($id);
        $v->estadovehiculo_id = $request->get('estadovehiculo_id');
        $v->save();
        return redirect('/cat_vehiculos');
    }

    public function gps($id)
    {        
        $v = Vehiculo::findOrFail($id);
        $id_vehiculo = $v->id;
        $historico = DB::table('vehiculogpshistoricos')
        ->where('vehiculo_id',$id_vehiculo)
        ->get();            

        if($historico->first()){$bandera = 1;}else{$bandera = 0;}

        
        
        return view('vehiculos.vehiculos.gps', [
            'v' => $v,
            'clientes' => Cliente::all(),
            'historico' => $historico,
            'bandera' => $bandera   
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

        return view('vehiculos.vehiculos.gpss', [
            'gpss' => $gpss,
            'bandera' => $bandera   
        ]);        
    }

    public function update_gps(Request $request, $id)
    {   
        //dd($request);
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

        $h = new vehiculogpshistorico();
        $h->vehiculo_id = $request->get('vehiculo_id');
        $h->gpscliente_id = $request->get('gpscliente_id');
        $h->placa = strtoupper($request->get('placa'));
        $h->serie = $imei;
        $h->imei = $serie;
        $new_cliente = $request->get('cliente_id');
        $c = Cliente::findOrFail($new_cliente);
        $cliente = $c->nombre;
        $h->cliente_nombre = $cliente;
        $h->cliente_id = $new_cliente;
        $h->save();
        DB::commit();

        return redirect('/cat_vehiculos');
    }

    public function historico($id)
    {        
        $v = Vehiculo::findOrFail($id);
        $historico = DB::table('vehiculogpshistoricos')
        ->where('vehiculo_id',$id)
        ->get();            
        
        return view('vehiculos.vehiculos.historicogps', [
            'v' => $v,
            'historico' => $historico   
        ]);        
    }

    public function nogps($id)
    {        
        DB::beginTransaction();
        $v = Vehiculo::findOrFail($id);
        $gpscliente_id = $v->gpscliente_id;
        $v->gpscliente_id = null;
        $v->save();

        $g = Gpscliente::findOrFail($gpscliente_id);
        $g->asignado = false;
        $g->save();
        DB::commit();
        return redirect('/cat_vehiculos');
    }
}

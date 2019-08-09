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
use App\Vehiculo;

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function submarca(Request $request)            //ELIMINA EL ELEMENTO
    {        
        $id_marca = $request->get('id_marca');
        $subs = Submarca::where('marca_id','=',$id_marca)->get();

        return view('vehiculos.vehiculos.submarca',[
            'submarcas' => $subs
        ]);
    }
}

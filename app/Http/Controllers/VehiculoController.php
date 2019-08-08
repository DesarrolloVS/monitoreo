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
        //
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
}

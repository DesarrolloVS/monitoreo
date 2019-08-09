<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehiculos.modelos.index', [
            'modelos' => Modelo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.modelos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $m = new Modelo();
        $m->descripcion = strtoupper($request->get('descripcion'));
        $m->save();
        return redirect('/cat_modelos');
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
        $m = Modelo::findOrFail($id);
        return view('vehiculos.modelos.edit', [
            'modelo' => $m
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
        $m = Modelo::findOrFail($id);
        $m->descripcion = strtoupper($request->get('descripcion'));
        $m->save();
        return redirect('/cat_modelos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $m = Modelo::findOrFail($id);
        $m->delete();
        return redirect('/cat_modelos');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $m = Modelo::findOrFail($id);
        return view('vehiculos.modelos.confirmDelete',[
            'modelo' => $m
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clasevehiculo;

class ClasevehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehiculos.clasevehiculo.index', [
            'cv' => Clasevehiculo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.clasevehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cv = new Clasevehiculo();
        $cv->descripcion = strtoupper($request->get('descripcion'));
        $cv->save();
        return redirect('/cat_clasevehiculo');
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
        $cv = Clasevehiculo::findOrFail($id);
        return view('vehiculos.clasevehiculo.edit', [
            'cv' => $cv
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
        $cv = Clasevehiculo::findOrFail($id);
        $cv->descripcion = strtoupper($request->get('descripcion'));
        $cv->save();
        return redirect('/cat_clasevehiculo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cv = Clasevehiculo::findOrFail($id);
        $cv->delete();
        return redirect('/cat_clasevehiculo');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $cv = Clasevehiculo::findOrFail($id);
        return view('vehiculos.clasevehiculo.confirmDelete',[
            'cv' => $cv
        ]);
    }
}

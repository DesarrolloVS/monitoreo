<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Procedencia;

class ProcedenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehiculos.procedencias.index', [
            'procedencias' => Procedencia::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.procedencias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Procedencia();
        $p->descripcion = strtoupper($request->get('descripcion'));
        $p->save();
        return redirect('/cat_procedencia');
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
        $p = Procedencia::findOrFail($id);
        return view('vehiculos.procedencias.edit', [
            'procedencia' => $p
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
        $p = Procedencia::findOrFail($id);
        $p->descripcion = strtoupper($request->get('descripcion'));
        $p->save();
        return redirect('/cat_procedencia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Procedencia::findOrFail($id);
        $p->delete();
        return redirect('/cat_procedencia');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $p = Procedencia::findOrFail($id);
        return view('vehiculos.procedencias.confirmDelete',[
            'procedencia' => $p
        ]);
    }
}

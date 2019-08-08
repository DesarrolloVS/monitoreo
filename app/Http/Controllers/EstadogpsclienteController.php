<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estadogpscliente;

class EstadogpsclienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.estadogpscliente.index', [
            'estados' => Estadogpscliente::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.estadogpscliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado = new Estadogpscliente();
        $estado->descripcion = strtoupper($request->get('descripcion'));
        $estado->save();
        return redirect('cat_estadogpscliente');
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
        $estado = Estadogpscliente::findOrFail($id);
        return view('catalogos.estadogpscliente.edit', [
            'estado' => $estado
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
        $estado = Estadogpscliente::findOrFail($id);
        $estado->descripcion = strtoupper($request->get('descripcion'));
        $estado->save();
        return redirect('cat_estadogpscliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado = Estadogpscliente::findOrFail($id);
        $estado->delete();
        return redirect('cat_estadogpscliente');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $estado = Estadogpscliente::findOrFail($id);
        return view('catalogos.estadogpscliente.confirmDelete',[
            'estado' => $estado
        ]);
    }
}

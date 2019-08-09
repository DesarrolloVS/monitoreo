<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estadovehiculo;

class EstadovehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehiculos.estadovehiculo.index', [
            'estados' => Estadovehiculo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.estadovehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado = new Estadovehiculo();
        $estado->descripcion = strtoupper($request->get('descripcion'));
        $estado->save();
        return redirect('cat_estadosvehiculos');
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
        $estado = Estadovehiculo::findOrFail($id);
        return view('vehiculos.estadovehiculo.edit', [
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
        $estado = Estadovehiculo::findOrFail($id);
        $estado->descripcion = strtoupper($request->get('descripcion'));
        $estado->save();
        return redirect('cat_estadosvehiculos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado = Estadovehiculo::findOrFail($id);
        $estado->delete();
        return redirect('cat_estadosvehiculos');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $estado = Estadovehiculo::findOrFail($id);
        return view('vehiculos.estadovehiculo.confirmDelete',[
            'estado' => $estado
        ]);
    }
}

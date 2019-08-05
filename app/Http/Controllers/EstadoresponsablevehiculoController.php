<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estadoresponsablevehiculo;
use App\Cliente;
use App\Usuario;

class EstadoresponsablevehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.estadosrespveh.index', [
            'estados' => Estadoresponsablevehiculo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('catalogos.estadosrespveh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $estado = new Estadoresponsablevehiculo();
        $estado->descripcion = strtoupper($request->get('descripcion'));
        $estado->save();
        return redirect('cat_estadosrespveh');
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
        $estado = Estadoresponsablevehiculo::findOrFail($id);
        return view('catalogos.estadosrespveh.edit', [
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
        $estado = Estadoresponsablevehiculo::findOrFail($id);
        $estado->descripcion = strtoupper($request->get('descripcion'));
        $estado->save();
        return redirect('cat_estadosrespveh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado = Estadoresponsablevehiculo::findOrFail($id);
        $estado->delete();
        return redirect('/cat_estadosrespveh');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $estado = Estadoresponsablevehiculo::findOrFail($id);
        return view('catalogos.estadosrespveh.confirmDelete',[
            'estado' => $estado
        ]);
    }

    
}

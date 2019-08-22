<?php

namespace App\Http\Controllers;

use App\Estadotraza;
use Illuminate\Http\Request;

class EstadotrazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.estadotrazas.index', [
            'ets' => Estadotraza::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.estadotrazas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required'
        ]);

        if($validatedData){
            $e = new Estadotraza();
            $e->descripcion = strtoupper($request->get('descripcion'));
            $e->save();
            return redirect('cat_estadotrazas');
        }
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
        $e = Estadotraza::findOrFail($id);
        return view('catalogos.estadotrazas.edit', [
            'et' => $e
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
        $validatedData = $request->validate([
            'descripcion' => 'required'
        ]);

        if($validatedData){
            $e = Estadotraza::findOrFail($id);
            $e->descripcion = strtoupper($request->get('descripcion'));
            $e->save();
            return redirect('cat_estadotrazas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e = Estadotraza::findOrFail($id);
        $e->delete();
        return redirect('/cat_estadotrazas');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $e = Estadotraza::findOrFail($id);
        return view('catalogos.estadotrazas.confirmDelete',[
            'et' => $e
        ]);
    }
}

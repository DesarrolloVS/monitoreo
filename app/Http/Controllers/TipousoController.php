<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipouso;

class TipousoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehiculos.tipouso.index', [
            'tu' => Tipouso::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.tipouso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tu = new Tipouso();
        $tu->descripcion = strtoupper($request->get('descripcion'));
        $tu->save();
        return redirect('/cat_tipouso');
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
        $tu = Tipouso::findOrFail($id);
        return view('vehiculos.tipouso.edit', [
            'tu' => $tu
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
        $tu = Tipouso::findOrFail($id);
        $tu->descripcion = strtoupper($request->get('descripcion'));
        $tu->save();
        return redirect('/cat_tipouso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tu = Tipouso::findOrFail($id);
        $tu->delete();
        return redirect('/cat_tipouso');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $tu = Tipouso::findOrFail($id);
        return view('vehiculos.tipouso.confirmDelete',[
            'tu' => $tu
        ]);
    }
}

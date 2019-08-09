<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipocombustible;

class TipocombustibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehiculos.tipocombustible.index', [
            'tc' => Tipocombustible::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.tipocombustible.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tc = new Tipocombustible();
        $tc->descripcion = strtoupper($request->get('descripcion'));
        $tc->save();
        return redirect('/cat_tipocombustible');
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
        $tc = Tipocombustible::findOrFail($id);
        return view('vehiculos.tipocombustible.edit', [
            'tc' => $tc
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
        $tc = Tipocombustible::findOrFail($id);
        $tc->descripcion = strtoupper($request->get('descripcion'));
        $tc->save();
        return redirect('/cat_tipocombustible');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tc = Tipocombustible::findOrFail($id);
        $tc->delete();
        return redirect('/cat_tipocombustible');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $tc = Tipocombustible::findOrFail($id);
        return view('vehiculos.tipocombustible.confirmDelete',[
            'tc' => $tc
        ]);
    }
}

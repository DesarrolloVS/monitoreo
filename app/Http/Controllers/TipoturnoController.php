<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipoturno;

class TipoturnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.tipoturnos.index', [
            'tts' => Tipoturno::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.tipoturnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $tt = new Tipoturno();
        $tt->descripcion = strtoupper($request->get('descripcion'));
        $tt->save();
        return redirect('cat_tipoturnos');
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
        $tt = Tipoturno::findOrFail($id);
        return view('catalogos.tipoturnos.edit', [
            'tt' => $tt
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
        $tt = Tipoturno::findOrFail($id);
        $tt->descripcion = strtoupper($request->get('descripcion'));
        $tt->save();

        return redirect('cat_tipoturnos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tt = Tipoturno::findOrFail($id);
        $tt->delete();
        return redirect('/cat_tipoturnos');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $tt = Tipoturno::findOrFail($id);
        return view('catalogos.tipoturnos.confirmDelete',[
            'tt' => $tt
        ]);
    }
}

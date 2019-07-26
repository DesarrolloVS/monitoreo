<?php

namespace App\Http\Controllers;

use App\Tipopersona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipopersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.tipopersonas.index', [
            'tipopersonas' => TipoPersona::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.tipopersonas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $tp = new Tipopersona();

        $tp->descripcion = strtoupper($request->get('descripcion'));
        $tp->save();
        DB::commit();
        return redirect('cat_tipopersonas');
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
        $tp = Tipopersona::findOrFail($id);
        return view('catalogos.tipopersonas.edit', [
            'tp' => $tp
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
        DB::beginTransaction();
        $tp = Tipopersona::findOrFail($id);
        $tp->descripcion = strtoupper($request->get('descripcion'));
        $tp->save();
        DB::commit();

        return redirect('cat_tipopersonas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tp = Tipopersona::findOrFail($id);
        $tp->delete();
        return redirect('/cat_tipopersonas');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $tp = Tipopersona::findOrFail($id);
        return view('catalogos.tipopersonas.confirmDelete',[
            'tp' => $tp
        ]);
    }
}

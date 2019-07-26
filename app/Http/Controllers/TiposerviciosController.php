<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tiposervicio;
use Illuminate\Support\Facades\DB;

class TiposerviciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.tiposervicios.index', [
            'tiposervicios' => Tiposervicio::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.tiposervicios.create');
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
        $ts = new Tiposervicio();

        $ts->descripcion = strtoupper($request->get('descripcion'));
        $ts->save();
        DB::commit();
        return redirect('cat_tiposervicios');
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
        $ts = Tiposervicio::findOrFail($id);
        return view('catalogos.tiposervicios.edit', [
            'ts' => $ts
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
        $ts = Tiposervicio::findOrFail($id);
        $ts->descripcion = strtoupper($request->get('descripcion'));
        $ts->save();
        DB::commit();

        return redirect('cat_tiposervicios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ts = Tiposervicio::findOrFail($id);
        $ts->delete();
        return redirect('/cat_tiposervicios');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $ts = Tiposervicio::findOrFail($id);
        return view('catalogos.tiposervicios.confirmDelete',[
            'ts' => $ts
        ]);
    }
}

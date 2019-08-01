<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estadoturno;
use Illuminate\Support\Facades\DB;

class EstadosturnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.estadosturnos.index', [
            'ets' => Estadoturno::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.estadosturnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $et = new Estadoturno();
        $et->descripcion =  strtoupper($request->get('descripcion'));
        $et->save();

        return redirect('cat_estadosturnos');
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
        $et = Estadoturno::findOrFail($id);
        return view('catalogos.estadosturnos.edit',[
            'et' => $et
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
        $et = Estadoturno::findOrFail($id);
        $et->descripcion = strtoupper($request->get('descripcion'));
        $et->save();

        return redirect ('cat_estadosturnos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $et = Estadoturno::findOrFail($id);
        $et->delete();
        return redirect('/cat_estadosturnos');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $et = Estadoturno::findOrFail($id);
        return view('catalogos.estadosturnos.confirmDelete',[
            'et' => $et
        ]);
    }
}

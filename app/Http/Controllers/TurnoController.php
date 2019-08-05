<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turno;
use App\Estadoturno;
use App\Tipoturno;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.turnos.index', [
            'turnos' => Turno::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.turnos.create',[
            'et' => Estadoturno::all(),
            'tt' => Tipoturno::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $t = new Turno();
        $t->descripcion = strtoupper($request->get('descripcion'));
        $t->horainicio = $request->get('horainicio');
        $t->horafin = $request->get('horafin');
        $t->tipoturno_id = $request->get('tipoturno_id');
        $t->save();
        return redirect('cat_turnos');
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
        return view('catalogos.turnos.edit',[
            'tt' => Tipoturno::all(),
            'turno' => Turno::findOrFail($id),
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
        $t = Turno::findOrFail($id);
        $t->descripcion = strtoupper($request->get('descripcion'));
        $t->horainicio = $request->get('horainicio');
        $t->horafin = $request->get('horafin');
        $t->tipoturno_id = $request->get('tipoturno_id');
        $t->save();
        return redirect('cat_turnos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = Turno::findOrFail($id);
        $t->delete();
        return redirect('/cat_turnos');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $t = Turno::findOrFail($id);
        return view('catalogos.turnos.confirmDelete',[
            't' => $t
        ]);        
    }

    public function estatus($id)
    {        
        $t = Turno::findOrFail($id);
        return view('catalogos.turnos.estatus', [
            't' => $t,
            'estados' => Estadoturno::all()    
        ]);        
    }

    public function update_estatus(Request $request, $id)
    {   
        $t = Turno::findOrFail($id);
        $t->estadoturno_id = $request->get('estadoturno_id');
        $t->save();
        return redirect('cat_turnos');
    }

}

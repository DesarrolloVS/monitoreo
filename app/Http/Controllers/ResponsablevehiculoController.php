<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Responsablevehiculo;
use App\Cliente;
use App\Usuario;
use App\Turno;
use App\Estadoresponsablevehiculo;

class ResponsablevehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.respveh.index', [
            'res' => Responsablevehiculo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.respveh.create',[
            'clientes' => Cliente::all(),
            'turnos' => Turno::all()
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
        $res = new Responsablevehiculo();
        $res->turno_id = $request->get('turno_id');
        $res->usuario_id = $request->get('usuario_id');
        $res->cliente_id = $request->get('cliente_id');
        $res->save();

        return redirect('cat_respveh');
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
        $res = Responsablevehiculo::findOrFail($id);
        $us = Usuario::where('cliente_id','=',$res->cliente_id)
                        ->where('empleado','=',1)
                        ->get();

        return view('catalogos.respveh.edit',[
            'r' => $res,
            'clientes' => Cliente::all(),
            'turnos' => Turno::all(),
            'us' => $us
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
        $res = Responsablevehiculo::findOrFail($id);
        $res->turno_id = $request->get('turno_id');
        $res->usuario_id = $request->get('usuario_id');
        $res->cliente_id = $request->get('cliente_id');
        $res->save();

        return redirect('cat_respveh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Responsablevehiculo::findOrFail($id);
        $res->delete();
        return redirect('/cat_respveh');
    }

    public function usuarios(Request $request)
    {
        $id_cliente = $request->get('id_cliente');
        $us = Usuario::where('cliente_id','=',$id_cliente)
                        ->where('empleado','=',1)
                        ->get();
        //dd($us);
        return view('catalogos.respveh.select',[
            'us' => $us
        ]);
    }

    public function estatus($id)            //ELIMINA EL ELEMENTO
    {        
        $res = Responsablevehiculo::findOrFail($id);

        //dd($res);
        return view('catalogos.respveh.estatus', [
            'r' => $res,
            'estados' => Estadoresponsablevehiculo::all()    
        ]);        
    }

    public function update_estatus(Request $request, $id)
    {   
        $res = Responsablevehiculo::findOrFail($id);
        $res->estadoresponsablevehiculo_id = $request->get('estadoresponsablevehiculo_id');
        $res->save();
        return redirect('cat_respveh');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $res = Responsablevehiculo::findOrFail($id);
        return view('catalogos.respveh.confirmDelete',[
            'r' => $res
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Tipoempleado;
use App\Cliente;
use App\Estadousuario;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.usuarios.index', [
            'usuarios' => Usuario::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.usuarios.create',[
            'clientes' => Cliente::all(),
            'tes' => Tipoempleado::all()
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
        $accesos = $request->get('tipoacceso_id');
        $empleado = $request->get('empleado');
        DB::beginTransaction();
        $us = new Usuario();
        if($empleado != null){
            $us->empleado = 1;
            $us->tipoempleado_id = $request->get('tipoempleado_id');
        }

        $us->nombre = strtoupper($request->get('nombre'));
        $us->paterno = strtoupper($request->get('paterno'));
        $us->materno = strtoupper($request->get('materno'));
        $us->email = strtoupper($request->get('email'));


        $us->rfc = strtoupper($request->get('rfc'));
        $us->curp = strtoupper($request->get('curp'));
        $us->cliente_id = strtoupper($request->get('cliente_id'));
        //$us->tipoacceso_id = $request->get('tipoacceso_id');
        if($accesos != null){
            if(in_array("rep_legal",$accesos)){
                $us->rep_legal = 1;
            } 
            if(in_array("contacto",$accesos)){
                $us->contacto = 1;
            } 

            if(in_array("usuario",$accesos)){
                $us->usuario = 1;
            } 
        }
        
        $us->save();
        DB::commit();
        return redirect('cat_usuarios');
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
        return view('usuario.edit',[
            'usuario' => Usuario::findOrFail($id),
            'clientes' => Cliente::all(),
            'tes' => Tipoempleado::all()
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
        $us = Usuario::findOrFail($id);
        $accesos = $request->get('tipoacceso_id');
        $empleado = $request->get('empleado');
        DB::beginTransaction();
        if($empleado != null){
            $us->empleado = 1;
            $us->tipoempleado_id = $request->get('tipoempleado_id');
        }else{
            $us->empleado = null;
            $us->tipoempleado_id = null;
        }

        $us->nombre = strtoupper($request->get('nombre'));
        $us->paterno = strtoupper($request->get('paterno'));
        $us->materno = strtoupper($request->get('materno'));
        $us->email = strtoupper($request->get('email'));


        $us->rfc = strtoupper($request->get('rfc'));
        $us->curp = strtoupper($request->get('curp'));
        $us->cliente_id = strtoupper($request->get('cliente_id'));
        
        if($accesos != null){
            if(in_array("rep_legal",$accesos)){
                $us->rep_legal = 1;
            }else{
                $us->rep_legal = null;
            } 
            if(in_array("contacto",$accesos)){
                $us->contacto = 1;
            }else{
                $us->contacto = null;
            }

            if(in_array("usuario",$accesos)){
                $us->usuario = 1;
            }else{
                $us->usuario = null;
            } 
        }else{
            $us->rep_legal = null;
            $us->contacto = null;
            $us->usuario = null;
        }
        
        $us->save();
        DB::commit();
        return redirect('cat_usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $us = Usuario::findOrFail($id);
        $us->delete();
        return redirect('/cat_usuarios');
    }
    
    public function estatus($id)
    {        
        $usuario = Usuario::findOrFail($id);
        return view('usuario.estatus', [
            'usuario' => $usuario,
            'estados' => Estadousuario::all()    
        ]);        
    }

    public function update_estatus(Request $request, $id)
    {   
        DB::beginTransaction();
        $usuario = Usuario::findOrFail($id);
        $usuario->estadousuario_id = $request->get('estadousuario_id');
        $usuario->save();
        DB::commit();
        return redirect('cat_usuarios');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $us = Usuario::findOrFail($id);
        return view('usuario.confirmDelete',[
            'us' => $us
        ]);
    }
}

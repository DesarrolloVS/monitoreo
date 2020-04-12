<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Estadousuario;
use App\Role;
use App\Rolesasignados;
use App\Tipoempleado;
use App\Usuario;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariocteController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('accesous: 1, 1, 2,admin,superuser');
        //$this->middleware('roles:admin,superuser');
    }
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
    public function create($id)
    {
        return view('catalogos.usuarioscte.create',[
            'cliente' => Cliente::findorFail($id),
            'cliente_id' => $id
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
        request()->validate([
            'nombre' => 'required',
            'paterno' => 'required',
            'email' => 'required|email',
            'rfc' => 'required',
            'tipoacceso_id' => 'required'
        ]);
        $accesos = $request->get('tipoacceso_id');
        $npass=bcrypt('CAMBIALO');
        DB::beginTransaction();
        $us = new User();
        $us->name = strtoupper($request->get('nombre'));
        $us->email = strtolower($request->get('email'));
        $us->password = $npass;
        $us->nombre = strtoupper($request->get('nombre'));
        $us->paterno = strtoupper($request->get('paterno'));
        $us->materno = strtoupper($request->get('materno'));
        $us->rfc = strtoupper($request->get('rfc'));
        $us->curp = strtoupper($request->get('curp'));
        $us->cliente_id = strtoupper($request->get('id_cliente'));
        $us->tipo_usuario = 0;

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
            if(in_array("aviso",$accesos)){
                $us->aviso = 1;
            }
        }
        $us->save();
        DB::commit();
        return redirect("/cat_clientes/".$request->get('id_cliente')."/usuarioscte");
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
    public function edit($id, $cliente)
    {
        $usuario = User::findOrFail($id);

        return view('catalogos.usuarioscte.edit',[
            'usuario' => $usuario,
            'cliente' => Cliente::findorFail($cliente)
        ]);
    }

    public function update(Request $request, $id, $cliente)
    {
        request()->validate([
            'nombre' => 'required',
            'paterno' => 'required',
            'email' => 'required|email',
            'rfc' => 'required',
            'tipoacceso_id' => 'required'
        ]);
        $us = User::findOrFail($id);
        $accesos = $request->get('tipoacceso_id');
        DB::beginTransaction();
        $us->name = strtoupper($request->get('nombre'));
        $us->nombre = strtoupper($request->get('nombre'));
        $us->paterno = strtoupper($request->get('paterno'));
        $us->materno = strtoupper($request->get('materno'));
        $us->email = strtolower($request->get('email'));
        $us->rfc = strtoupper($request->get('rfc'));
        $us->curp = strtoupper($request->get('curp'));

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
            if(in_array("aviso",$accesos)){
                $us->aviso = 1;
            }else{
                $us->aviso = null;
            }
        }else{
            $us->rep_legal = null;
            $us->contacto = null;
            $us->usuario = null;
            $us->aviso = null;
        }
        $us->save();
        DB::commit();
        return redirect("/cat_clientes/".$cliente."/usuarioscte");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $us = User::findOrFail($id);
        $us->delete();
        return redirect('/cat_usuarios');
    }

    public function estatus($id, $cliente)
    {
        $usuario = User::findOrFail($id);
        return view('catalogos.usuarioscte.estatus', [
            'cliente' => Cliente::findorFail($cliente),
            'usuario' => $usuario,
            'estados' => Estadousuario::all()
        ]);
    }

    public function update_estatus(Request $request, $id, $cliente)
    {
        request()->validate([
            'estadousuario_id' => 'required',
        ]);
        DB::beginTransaction();
        $usuario = User::findOrFail($id);
        $usuario->estadousuario_id = $request->get('estadousuario_id');
        $usuario->save();
        DB::commit();
        return redirect("/cat_clientes/".$cliente."/usuarioscte");
    }

    public function roles($id, $cliente)
    {
        $usuario = User::findOrFail($id);
        $rolesusu = Rolesasignados::where('user_id','=',$id)->get();
        $rolesusu=$rolesusu->pluck('role_id');
        $roles = Role::where('id','<',3)->pluck('display_name', 'id');
        return view('catalogos.usuarioscte.roles', [
            'cliente' => Cliente::findorFail($cliente),
            'usuario' => $usuario,
            'roles' => $roles,
            'rolesusu' => $rolesusu
        ]);
    }

    public function update_roles(Request $request, $id, $cliente)
    {
        request()->validate([
            'rolesusuariocte_id' => 'required',
        ]);
        $deletedRows = Rolesasignados::where('user_id', $id)->delete();
        $rolesusucte = $request->get('rolesusuariocte_id');
        DB::beginTransaction();
        foreach ($rolesusucte as $rolusucte_id => $s) {
            $c_roles = new Rolesasignados();
            $c_roles->user_id = $id;
            $c_roles->role_id = $s;
            $c_roles->save();
        }
        DB::commit();

        return redirect("/cat_clientes/".$cliente."/usuarioscte");
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {
        $us = User::findOrFail($id);
        return view('usuario.confirmDelete',[
            'us' => $us
        ]);
    }
}

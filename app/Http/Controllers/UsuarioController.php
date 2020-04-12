<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Estadousuario;
use App\Role;
use App\Rolesasignados;
use App\Tipoempleado;
use App\User;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
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
            'usuarios' => User::where('tipo_usuario','=',1)
            ->orderBy('id', 'ASC')
            ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.usuarios.create');
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
        ]);
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
        $us->usuario = 1;
        $us->tipo_usuario = 1;
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

        $usuario = User::findOrFail($id);

        return view('catalogos.usuarios.edit',[
            'usuario' => $usuario
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
        request()->validate([
            'nombre' => 'required',
            'paterno' => 'required',
            'email' => 'required|email',
            'rfc' => 'required',
        ]);
        $us = User::findOrFail($id);
        DB::beginTransaction();
        $us->name = strtoupper($request->get('nombre'));
        $us->nombre = strtoupper($request->get('nombre'));
        $us->paterno = strtoupper($request->get('paterno'));
        $us->materno = strtoupper($request->get('materno'));
        $us->email = strtolower($request->get('email'));
        $us->rfc = strtoupper($request->get('rfc'));
        $us->curp = strtoupper($request->get('curp'));
        $us->save();
        DB::commit();
        return redirect('/cat_usuarios');
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

    public function estatus($id)
    {
        //dd($id);
        $usuario = User::findOrFail($id);
        return view('catalogos.usuarios.estatus', [
            'usuario' => $usuario,
            'estados' => Estadousuario::all()
        ]);
    }

    public function update_estatus(Request $request, $id)
    {
        request()->validate([
            'estadousuario_id' => 'required'
        ]);
        DB::beginTransaction();
        $usuario = User::findOrFail($id);
        $usuario->estadousuario_id = $request->get('estadousuario_id');
        $usuario->save();
        DB::commit();
        return redirect('cat_usuarios');
    }

    public function roles($id)
    {
        $usuario = User::findOrFail($id);
        $rolesusu = Rolesasignados::where('user_id','=',$id)->get();
        $rolesusu=$rolesusu->pluck('role_id');
        $roles = Role::all()->pluck('display_name', 'id');
        return view('catalogos.usuarios.roles', [
            'usuario' => $usuario,
            'rolesusu' => $rolesusu,
            'roles' => $roles
        ]);
    }

    public function rolesupd(Request $request, $id)
    {
        request()->validate([
            'rolesusuario_id' => 'required',
        ]);
        $deletedRows = Rolesasignados::where('user_id', $id)->delete();
        $rolesusucte = $request->get('rolesusuario_id');
        DB::beginTransaction();
        foreach ($rolesusucte as $rolusucte_id => $s) {
            $c_roles = new Rolesasignados();
            $c_roles->user_id = $id;
            $c_roles->role_id = $s;
            $c_roles->save();
        }
        DB::commit();

        return redirect("/cat_usuarios");
    }
    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {
        $us = User::findOrFail($id);
        return view('usuario.confirmDelete',[
            'us' => $us
        ]);
    }
}

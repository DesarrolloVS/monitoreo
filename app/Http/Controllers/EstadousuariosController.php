<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estadousuario;
use Illuminate\Support\Facades\DB;

class EstadousuariosController extends Controller
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
        return view('catalogos.estadosusuario.index', [
            'eus' => Estadousuario::all()->sortBy("id")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.estadosusuario.create');
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
            'descripcion' => 'required'
        ]);
        DB::beginTransaction();
        $eu = new Estadousuario();

        $eu->descripcion = strtoupper($request->get('descripcion'));
        $eu->save();
        DB::commit();
        return redirect('cat_estadosusuario');
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
        $eu = Estadousuario::findOrFail($id);
        return view('catalogos.estadosusuario.edit', [
            'eu' => $eu
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
            'descripcion' => 'required'
        ]);
        DB::beginTransaction();
        $eu = Estadousuario::findOrFail($id);
        $eu->descripcion = strtoupper($request->get('descripcion'));
        $eu->save();
        DB::commit();

        return redirect('cat_estadosusuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eu = Estadousuario::findOrFail($id);
        $eu->delete();
        return redirect('/cat_estadosusuario');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {
        $eu = Estadousuario::findOrFail($id);
        return view('catalogos.estadosusuario.confirmDelete',[
            'eu' => $eu
        ]);
    }
}

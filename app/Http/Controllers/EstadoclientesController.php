<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estadocliente;
use Illuminate\Support\Facades\DB;

class EstadoclientesController extends Controller
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
        return view('catalogos.estadoclientes.index', [
            'estados' => Estadocliente::all()->sortBy("id")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.estadoclientes.create');
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
        $estado = new Estadocliente();

        $estado->descripcion = strtoupper($request->get('descripcion'));
        $estado->save();
        DB::commit();
        return redirect('cat_estadoclientes');
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
        $estado = Estadocliente::findOrFail($id);
        return view('catalogos.estadoclientes.edit', [
            'estado' => $estado
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
        $estado = Estadocliente::findOrFail($id);
        $estado->descripcion = strtoupper($request->get('descripcion'));
        $estado->save();
        DB::commit();

        return redirect('cat_estadoclientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado = Estadocliente::findOrFail($id);
        $estado->delete();
        return redirect('/cat_estadoclientes');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {
        $estado = Estadocliente::findOrFail($id);
        return view('catalogos.estadoclientes.confirmDelete',[
            'estado' => $estado
        ]);
    }
}

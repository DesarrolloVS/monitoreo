<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipoempresa;
use Illuminate\Support\Facades\DB;

class TipoempresasController extends Controller
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
        return view('catalogos.tipoempresas.index', [
            'tipoempresas' => Tipoempresa::all()->sortBy("id")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.tipoempresas.create');
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
        $te = new Tipoempresa();

        $te->descripcion = strtoupper($request->get('descripcion'));
        $te->save();
        DB::commit();
        return redirect('cat_tipoempresas');
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
        $te = Tipoempresa::findOrFail($id);
        return view('catalogos.tipoempresas.edit', [
            'te' => $te
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
        $te = Tipoempresa::findOrFail($id);
        $te->descripcion = strtoupper($request->get('descripcion'));
        $te->save();
        DB::commit();

        return redirect('cat_tipoempresas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $te = Tipoempresa::findOrFail($id);
        $te->delete();
        return redirect('/cat_tipoempresas');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {
        $te = Tipoempresa::findOrFail($id);
        return view('catalogos.tipoempresas.confirmDelete',[
            'te' => $te
        ]);
    }
}

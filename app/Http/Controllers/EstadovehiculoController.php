<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estadovehiculo;

class EstadovehiculoController extends Controller
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
        return view('catalogos.estadovehiculo.index', [
            'estados' => Estadovehiculo::all()->sortBy("id")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.estadovehiculo.create');
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
        $estado = new Estadovehiculo();
        $estado->descripcion = strtoupper($request->get('descripcion'));
        $estado->save();
        return redirect('cat_estadosvehiculos');
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
        $estado = Estadovehiculo::findOrFail($id);
        return view('catalogos.estadovehiculo.edit', [
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
        $estado = Estadovehiculo::findOrFail($id);
        $estado->descripcion = strtoupper($request->get('descripcion'));
        $estado->save();
        return redirect('cat_estadosvehiculos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado = Estadovehiculo::findOrFail($id);
        $estado->delete();
        return redirect('cat_estadosvehiculos');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {
        $estado = Estadovehiculo::findOrFail($id);
        return view('catalogos.estadovehiculo.confirmDelete',[
            'estado' => $estado
        ]);
    }
}

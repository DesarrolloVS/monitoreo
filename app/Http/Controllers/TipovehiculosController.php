<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipovehiculo;

class TipovehiculosController extends Controller
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
        return view('catalogos.tipovehiculos.index', [
            'tv' => Tipovehiculo::all()->sortBy("id")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.tipovehiculos.create');
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

        $tv = new Tipovehiculo();
        $tv->descripcion = strtoupper($request->get('descripcion'));
        $tv->save();
        return redirect('/cat_tipovehiculos');
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
        $tv = Tipovehiculo::findOrFail($id);
        return view('catalogos.tipovehiculos.edit', [
            'tv' => $tv
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
        $tv = Tipovehiculo::findOrFail($id);
        $tv->descripcion = strtoupper($request->get('descripcion'));
        $tv->save();
        return redirect('/cat_tipovehiculos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tv = Tipovehiculo::findOrFail($id);
        $tv->delete();
        return redirect('/cat_tipovehiculos');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {
        $tv = Tipovehiculo::findOrFail($id);
        return view('catalogos.tipovehiculos.confirmDelete',[
            'tv' => $tv
        ]);
    }
}

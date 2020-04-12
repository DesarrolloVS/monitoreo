<?php

namespace App\Http\Controllers;

use App\Tipotraza;
use Illuminate\Http\Request;

class TipotrazaController extends Controller
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
        return view('catalogos.tipotraza.index', [
            'tt' => Tipotraza::all()->sortBy("id")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.tipotraza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required'
        ]);

        if($validatedData){
            $tt = new Tipotraza();
            $tt->descripcion = strtoupper($request->get('descripcion'));
            $tt->save();
            return redirect('cat_tipotraza');
        }
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
        $tt = Tipotraza::findOrFail($id);
        return view('catalogos.tipotraza.edit', [
            'tt' => $tt
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
        $validatedData = $request->validate([
            'descripcion' => 'required'
        ]);

        if($validatedData){
            $tt = Tipotraza::findOrFail($id);
            $tt->descripcion = strtoupper($request->get('descripcion'));
            $tt->save();
            return redirect('cat_tipotraza');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tt = Tipotraza::findOrFail($id);
        $tt->delete();
        return redirect('/cat_tipotraza');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {
        $tt = Tipotraza::findOrFail($id);
        return view('catalogos.tipotraza.confirmDelete',[
            'tt' => $tt
        ]);
    }
}

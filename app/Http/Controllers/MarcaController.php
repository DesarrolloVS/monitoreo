<?php

namespace App\Http\Controllers;
use App\Marca;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.marca.index', [
            'marcas' => Marca::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marca = new Marca();
        $marca->descripcion_marca = strtoupper($request->get('descripcion'));
        $marca->save();
        return redirect('cat_marca');
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
        $id_marca = Marca::findOrFail($id);
        return view('catalogos.marca.edit', [
            'marca' => $id_marca
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
        $marca = Marca::findOrFail($id);
        $marca->descripcion_marca = strtoupper($request->get('descripcion'));
        $marca->save();
        return redirect('cat_marca');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id_marca = Marca::findOrFail($id);
        $id_marca->delete();
        return redirect('/cat_marca');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $marca = Marca::findOrFail($id);
        return view('catalogos.marca.confirmDelete',[
            'marca' => $marca
        ]);
    }
}

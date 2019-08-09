<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submarca;
use App\Marca;

class SubmarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehiculos.submarcas.index', [
            'submarcas' => Submarca::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.submarcas.create',[
            'marcas' => Marca::all()
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
        $s = new Submarca();
        $s->marca_id = $request->get('marca_id');
        $s->descripcion = strtoupper($request->get('descripcion'));
        $s->save();
        return redirect('/cat_submarca');
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
        $submarca = Submarca::findOrFail($id);
        return view('vehiculos.submarcas.edit', [
            'marcas' => Marca::all(),
            'submarca' => $submarca
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
        $s = Submarca::findOrFail($id);
        $s->marca_id = $request->get('marca_id');
        $s->descripcion = strtoupper($request->get('descripcion'));
        $s->save();
        return redirect('/cat_submarca');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s = Submarca::findOrFail($id);
        $s->delete();
        return redirect('/cat_submarca');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $submarca = Submarca::findOrFail($id);
        return view('vehiculos.submarcas.confirmDelete',[
            'submarca' => $submarca
        ]);
    }
}

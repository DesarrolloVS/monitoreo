<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipodomicilio;
use Illuminate\Support\Facades\DB;

class TipodomicilioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.tipodomicilio.index', [
            'tipodomicilios' => Tipodomicilio::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.tipodomicilio.create');
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
        $td = new Tipodomicilio();

        $td->descripcion = strtoupper($request->get('descripcion'));
        $td->save();
        DB::commit();
        return redirect('cat_tipodomicilios');
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
        $td = Tipodomicilio::findOrFail($id);
        return view('catalogos.tipodomicilio.edit', [
            'td' => $td
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
        DB::beginTransaction();
        $td = Tipodomicilio::findOrFail($id);
        $td->descripcion = strtoupper($request->get('descripcion'));
        $td->save();
        DB::commit();

        return redirect('cat_tipodomicilios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $td = Tipodomicilio::findOrFail($id);
        $td->delete();
        return redirect('/cat_tipodomicilios');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {
        $td = Tipodomicilio::findOrFail($id);
        return view('catalogos.tipodomicilio.confirmDelete',[
            'td' => $td
        ]);
    }
}

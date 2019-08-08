<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gpsmarcamodelo;

class GpsmarcamodeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.gpsmarcamodelo.index', [
            'gps' => Gpsmarcamodelo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.gpsmarcamodelo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $gps = new Gpsmarcamodelo();
        $gps->marca = strtoupper($request->get('marca'));
        $gps->modelo = strtoupper($request->get('modelo'));
        $gps->save();
        return redirect('cat_gpsmarcamodelo');
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
        $gps = Gpsmarcamodelo::findOrFail($id);
        return view('catalogos.gpsmarcamodelo.edit', [
            'gps' => $gps
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
        $gps = Gpsmarcamodelo::findOrFail($id);
        $gps->marca = strtoupper($request->get('marca'));
        $gps->modelo = strtoupper($request->get('modelo'));
        $gps->save();
        return redirect('cat_gpsmarcamodelo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gps = Gpsmarcamodelo::findOrFail($id);
        $gps->delete();
        return redirect('/cat_gpsmarcamodelo');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $gps = Gpsmarcamodelo::findOrFail($id);
        return view('catalogos.gpsmarcamodelo.confirmDelete',[
            'gps' => $gps
        ]);
    }
}

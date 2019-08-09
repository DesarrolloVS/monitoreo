<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gpscliente;
use App\Gpsmarcamodelo;
use App\Cliente;
use App\Estadogpscliente;

class GpsclienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.gpscliente.index', [
            'gps' => Gpscliente::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.gpscliente.create',[            
            'clientes' => Cliente::all()
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
        $gps = new Gpscliente();
        $gps->serie = strtoupper($request->get('serie'));
        $gps->imei = strtoupper($request->get('imei'));
        $gps->puerto = strtoupper($request->get('puerto'));
        $gps->sincronizacion = strtoupper($request->get('sincronizacion'));
        $gps->gpsmarcamodelo_id = strtoupper($request->get('gpsmarcamodelo_id'));
        $gps->cliente_id = strtoupper($request->get('cliente_id'));
        
        $gps->save();
        return redirect('cat_gpscliente');
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
        $gps = Gpscliente::findOrFail($id);
        return view('catalogos.gpscliente.edit',[
            'gps' => $gps,
            'clientes' => Cliente::all(),
            'mm' => Gpsmarcamodelo::all()
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
        $gps = Gpscliente::findOrFail($id);
        $gps->serie = strtoupper($request->get('serie'));
        $gps->imei = strtoupper($request->get('imei'));
        $gps->puerto = strtoupper($request->get('puerto'));
        $gps->sincronizacion = strtoupper($request->get('sincronizacion'));
        $gps->gpsmarcamodelo_id = strtoupper($request->get('gpsmarcamodelo_id'));
        $gps->cliente_id = strtoupper($request->get('cliente_id'));
        
        $gps->save();
        return redirect('cat_gpscliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gps = Gpscliente::findOrFail($id);
        $gps->delete();
        return redirect('cat_gpscliente');
    }

    public function form()
    {
        return view('catalogos.gpscliente.form', [
            'mm' => Gpsmarcamodelo::all(),
        ]);        
    }

    public function estatus($id)
    {        
        $gps = Gpscliente::findOrFail($id);
        return view('catalogos.gpscliente.estatus', [
            'gps' => $gps,
            'estados' => Estadogpscliente::all()    
        ]);        
    }

    public function update_estatus(Request $request, $id)
    {   
        $gps = Gpscliente::findOrFail($id);
        $gps->estadogpscliente_id = $request->get('estadogpscliente_id');
        $gps->save();
        return redirect('cat_gpscliente');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $gps = Gpscliente::findOrFail($id);
        return view('catalogos.gpscliente.confirmDelete',[
            'gps' => $gps
        ]);
    }
}

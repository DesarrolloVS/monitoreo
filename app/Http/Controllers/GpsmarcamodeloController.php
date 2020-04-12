<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Gpsalerta;
use App\Gpsmarcamodelo;
use App\Traza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GpsmarcamodeloController extends Controller
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
        return view('catalogos.gpsmarcamodelo.index', [
            'gps' => Gpsmarcamodelo::all()->sortBy("id")
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
        request()->validate([
            'marca' => 'required',
            'modelo' => 'required',
        ]);
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
        request()->validate([
            'marca' => 'required',
            'modelo' => 'required',
        ]);
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

    public function trazasgpsmm($id)
    {
        $gps = Gpsmarcamodelo::findOrFail($id);
        $trazasmm = Traza::where('gpsmarcamodelo_id', '=', $id)->get();
        return view('catalogos.trazasgpsmm.index', [
            'gps' => $gps,
            'trazasmm' => $trazasmm
        ]);
    }

    public function alertasgpsmm($id)
    {
        $gps = Gpsmarcamodelo::findOrFail($id);
        $alertasmm = Gpsalerta::where('gpsmarcamodelo_id', '=', $id)
        ->orderBy('id', 'ASC')
        ->get();
        return view('catalogos.alertasgpsmm.index', [
            'gps' => $gps,
            'alertasmm' => $alertasmm
        ]);
    }

    public function estatus($id)
    {
        $gps = Gpsmarcamodelo::findOrFail($id);

        return view('catalogos.gpsmarcamodelo.estatus', [
            'gps' => $gps
        ]);
    }

    public function estatusupd(Request $request, $id)
    {
        request()->validate([
            'estadogps' => 'required'
        ]);
        $gps = Gpsmarcamodelo::findOrFail($id);
        $gps->estado = $request->get('estadogps');
        $gps->save();

        return redirect('cat_gpsmarcamodelo');
    }


}

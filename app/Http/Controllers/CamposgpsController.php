<?php

namespace App\Http\Controllers;

use App\Camposgps;
use App\Gpsmarcamodelo;
use Illuminate\Http\Request;

class CamposgpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // dd($request);
        if ($request->has('gpsmarcamodelo_id')) {
             $g = $request->get('gpsmarcamodelo_id');
        }else{
            $g = "";
        }

        //dd($g);

        return view('catalogos.camposgps.index', [
            'mm' => Gpsmarcamodelo::all(),
            'g' => $g
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {   //echo $id; dd($request);
        $mm = Gpsmarcamodelo::findOrFail($id);
        return view('catalogos.camposgps.create', [
            'id' => $id,
            'mm' => $mm
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
        $gpsmarcamodelo_id = $request->get('gpsmarcamodelo_id');
        $validatedData = $request->validate([
            'descripcion' => 'required'
        ]);

        if($validatedData){
            $c = new Camposgps();
            $c->gpsmarcamodelo_id = $request->get('gpsmarcamodelo_id');
            $c->descripcion = strtoupper($request->get('descripcion'));
            $c->save();
            return redirect()->route('/gps/campos',['gpsmarcamodelo_id' => $gpsmarcamodelo_id]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function camposgps(Request $request)            //ELIMINA EL ELEMENTO
    {        
        $gpsmarcamodelo_id = $request->get('gpsmarcamodelo_id');
        $mm = Gpsmarcamodelo::where('id',$gpsmarcamodelo_id)->get();
        $campos = Camposgps::where('gpsmarcamodelo_id',$gpsmarcamodelo_id)->get();

        return view('catalogos.camposgps.filtro',[
            'id' => $gpsmarcamodelo_id,
            'campos' => $campos,
            'mm' => $mm
        ]);
    }
}

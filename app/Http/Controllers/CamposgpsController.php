<?php

namespace App\Http\Controllers;

use App\Camposgps;
use App\Gpsmarcamodelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CamposgpsController extends Controller
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
    // public function index(Request $request)
    public function index()
    {
        return view('catalogos.camposgps.index', [
            'campos' => Camposgps::all()->sortBy("id")
        ]);
        // dd($request);
        // if ($request->has('gpsmarcamodelo_id')) {
        //      $g = $request->get('gpsmarcamodelo_id');
        // }else{
        //     $g = "";
        // }

        // //dd($g);

        // return view('catalogos.camposgps.index', [
        //     'mm' => Gpsmarcamodelo::all(),
        //     'g' => $g
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   //echo $id; dd($request);
        // $mm = Gpsmarcamodelo::findOrFail($id);
        // return view('catalogos.camposgps.create', [
        //     'id' => $id,
        //     'mm' => $mm
        // ]);
        return view('catalogos.camposgps.create');
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
            'campo' => 'required',
            'descripcion' => 'required'
        ]);

        if($validatedData){
            $c = new Camposgps();
            $c->campo = strtoupper($request->get('campo'));
            $c->descripcion = strtoupper($request->get('descripcion'));
            $c->save();
            // return redirect()->route('/gps/campos',['gpsmarcamodelo_id' => $gpsmarcamodelo_id]);
            return redirect("cat_camposgps");
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
        $camposgps = Camposgps::findOrFail($id);
        return view('catalogos.camposgps.edit', [
            'camposgps' => $camposgps
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
            'campo' => 'required',
            'descripcion' => 'required'
        ]);
        DB::beginTransaction();
        $camposgps = Camposgps::findOrFail($id);
        $camposgps->descripcion = strtoupper($request->get('descripcion'));
        $camposgps->campo = strtoupper($request->get('campo'));
        $camposgps->save();
        DB::commit();

        return redirect('cat_camposgps');

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
}

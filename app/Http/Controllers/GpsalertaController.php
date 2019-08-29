<?php

namespace App\Http\Controllers;

use App\Gpsalerta;
use App\Gpsmarcamodelo;
use App\Traza;
use App\Trazaposicion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GpsalertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.gpsalerta.index', [
            'alertas' => Gpsalerta::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mm = Gpsmarcamodelo::all();
        $actuales = Gpsalerta::all();
        // $act = array();
        // foreach($actuales as $a){array_push($act,$a->gpsmarcamodelo_id);}
        // $res = $mm->diff(Gpsmarcamodelo::whereIn('id',$act)->get());

        return view('catalogos.gpsalerta.create',[
            'mm' => $mm
            // 'tt' => Tipotraza::all()
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
        // dd($request);
        $validatedData = $request->validate([
            'gpsmarcamodelo_id' => 'required',
            'alerta' => 'required',
            'descripcion' => 'required',
            'camposgps_id' => 'required',
            'condicion' => 'required',
            'valor' => 'required|integer'
        ], [
            'gpsmarcamodelo_id.required' => 'El campo <i>Marca-Modelo</i> es obligatorio'
            
        ]);

        if($validatedData){
            $x = new Gpsalerta();
            $x->gpsmarcamodelo_id = $request->get('gpsmarcamodelo_id');
            $x->alerta = strtoupper($request->get('alerta'));
            $x->descripcion = strtoupper($request->get('descripcion'));
            $x->camposgps_id = $request->get('camposgps_id');
            $x->condicion = $request->get('condicion');
            $x->valor = $request->get('valor');
            $x->save();
            return redirect('cat_gpsalerta');
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
        $mm = Gpsmarcamodelo::all();
        $ga = Gpsalerta::findOrFail($id);
        $campo = $ga->camposgps_id;
        $gpsmarcamodelo_id = $ga->gpsmarcamodelo_id;

        $t = Traza::where('gpsmarcamodelo_id',$gpsmarcamodelo_id)->first();
        $t_id = $t->id;
        $tp = Trazaposicion::where('traza_id',$t_id)->get();            //dd($tp);

        return view('catalogos.gpsalerta.edit', [
            'ga' => $ga,
            'mm' => $mm,
            'campo' => $campo,
            'campos' => $tp
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
        // $ga = Gpsalerta::findOrFail($id);
        // $m->descripcion = strtoupper($request->get('descripcion'));
        // $m->save();
        // return redirect('/cat_modelos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ga = Gpsalerta::findOrFail($id);
        $ga->delete();
        return redirect('cat_gpsalerta');
    }

    public function complement(Request $request)            //ELIMINA EL ELEMENTO
    {        
        $gpsmarcamodelo_id = $request->get('gpsmarcamodelo_id');
        //EXISTENTES
        // $rs = Gpsalerta::where('gpsmarcamodelo_id',$gpsmarcamodelo_id)->get();
        // $ex = array();
        // foreach($rs as $r){array_push($ex,$r->camposgps_id);}
        $t = Traza::where('gpsmarcamodelo_id',$gpsmarcamodelo_id)->first();
        $t_id = $t->id;
        // $tp = Trazaposicion::where('traza_id',$t_id)->get();
        $campos = Trazaposicion::where('traza_id',$t_id)->get();

        // $campos = $tp->diff(Trazaposicion::whereIn('camposgps_id',$ex)->get());

        return view('catalogos.gpsalerta.complemento',[
            'campos' => $campos
        ]);
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $ga = Gpsalerta::findOrFail($id);
        return view('catalogos.gpsalerta.confirmDelete',[
            'ga' => $ga
        ]);
    }

    public function estatus($id)
    {        
        $ga = Gpsalerta::findOrFail($id);
        return view('catalogos.gpsalerta.estatus', [
            'ga' => $ga
        ]);        
    }

    public function update_estatus(Request $request, $id)
    {   
        $ga = Gpsalerta::findOrFail($id);
        $ga->estado = $request->get('estado');
        $ga->save();
        return redirect('/cat_gpsalerta');
    }
}

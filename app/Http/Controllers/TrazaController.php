<?php

namespace App\Http\Controllers;

use App\Camposgps;
use App\Gpsmarcamodelo;
use App\Tipotraza;
use App\Traza;
use App\Trazaposicion;
use Illuminate\Http\Request;

class TrazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Traza::all());
        return view('catalogos.trazas.index', [
            'trazas' => Traza::all()
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
        $actuales = Traza::all();
        $act = array();
        foreach($actuales as $a){array_push($act,$a->gpsmarcamodelo_id);}
        $res = $mm->diff(Gpsmarcamodelo::whereIn('id',$act)->get());

        return view('catalogos.trazas.create',[
            'mm' => $res,
            'tt' => Tipotraza::all()
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
        $validatedData = $request->validate([
            'gpsmarcamodelo_id' => 'required',
            'descripcion' => 'required',
            'tipotraza_id' => 'required',
            'num_posiciones' => 'required|integer'
        ], [
            'gpsmarcamodelo_id.required' => 'El campo <i>Marca-Modelo</i> es obligatorio',
            'tipotraza_id.required' => 'El campo <i>Tipo Traza</i> es obligatorio',
            'num_posiciones.required' => 'El campo <i>posiciones</i> es obligatorio',
        ]);

        if($validatedData){
            $t = new Traza();
            $t->gpsmarcamodelo_id = $request->get('gpsmarcamodelo_id');
            $t->descripcion = strtoupper($request->get('descripcion'));
            $t->num_posiciones = strtoupper($request->get('num_posiciones'));
            $t->tipotraza_id = $request->get('tipotraza_id');
            $t->save();
            return redirect('cat_trazas');
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

    public function positions($id)      //$id =  id_traza
    {        

        $t = Traza::findOrFail($id);
        $posiciones = $t->num_posiciones;
        $arr = array();
        for($i=1;$i<=$posiciones;$i++ ){array_push($arr,$i);}

        $tp = Trazaposicion::where('traza_id',$id)->get();
        $actuales = array();
        $actuales2 = array();
        foreach($tp as $x){
            array_push($actuales, $x->posicion);
            array_push($actuales2, $x->camposgps_id);
        }
        $pos = array_diff($arr,$actuales);
        $campos = Camposgps::orderBy('descripcion', 'asc')
            ->get();
        $camp = $campos
            ->diff(Camposgps::whereIn('id',$actuales2)
            ->orderBy('descripcion', 'asc')
            ->get());
        $ps = Trazaposicion::where('traza_id',$id)->get();
        return view('catalogos.trazas.posiciones', [
            't' => $t,
            'ps' => $ps,
            'campos' => $camp,
            'posiciones' => $pos
        ]);        
    }

    public function store_position(Request $request, $id)
    {   
        $validatedData = $request->validate([
            'posicion' => 'required|integer',
            'camposgps_id' => 'required'
        ], [
            'camposgps_id.required' => 'El dato campo GPS es obligatorio'
        ]);

        if($validatedData){
            $tp = new Trazaposicion();
            $tp->camposgps_id = $request->get('camposgps_id');
            $tp->posicion = $request->get('posicion');
            $tp->traza_id = $id;
            $tp->save();
            return redirect("cat_trazas/$id/posiciones");
        }
    }

    public function confirmDeletePosition($id)            //ELIMINA EL ELEMENTO
    {        
        $tp = Trazaposicion::findOrFail($id);
        $traza_id = $tp->traza_id;
        $t = Traza::findOrFail($traza_id);

        return view('catalogos.trazas.confirmDeletePosition',[
            'tp' => $tp,
            't' => $t
        ]);
    }

    public function destroyPosition($id)
    {        
        $tp = Trazaposicion::findOrFail($id);
        $traza_id = $tp->traza_id;
        $tp->delete();
        return redirect("/cat_trazas/$traza_id/posiciones");
        
    }
}

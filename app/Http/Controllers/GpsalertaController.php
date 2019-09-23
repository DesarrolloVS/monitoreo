<?php

namespace App\Http\Controllers;

use App\Gpsalerta;
use App\Gpsmarcamodelo;
use App\Tipovehiculo;
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
        //$actuales = Gpsalerta::all();
        // $act = array();
        // foreach($actuales as $a){array_push($act,$a->gpsmarcamodelo_id);}
        // $res = $mm->diff(Gpsmarcamodelo::whereIn('id',$act)->get());

        return view('catalogos.gpsalerta.create',[
            'mm' => $mm,
            'tv' => Tipovehiculo::all()
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
        //dd($request);
        $validatedData = $request->validate([
            'gpsmarcamodelo_id' => 'required',
            'alerta' => 'required',
            'tipoalerta' => 'required',
            'camposgps_id' => 'required',
            'tipodato' => 'required',
            'funcion' => 'required'            
        ], [
            'gpsmarcamodelo_id.required' => 'El campo <i>Marca-Modelo</i> es obligatorio'
        ]);

        $tipodato = $request->get('tipodato');

        if($validatedData){
            $x = new Gpsalerta();
            $x->gpsmarcamodelo_id = $request->get('gpsmarcamodelo_id');
            $x->alerta = strtoupper($request->get('alerta'));
            $x->tipoalerta = $request->get('tipoalerta');
            $x->tipovehiculo_id = $request->get('tipovehiculo_id');
            $x->camposgps_id = $request->get('camposgps_id');
            $x->tipodato = $request->get('tipodato');
            $x->funcion = $request->get('funcion');
            $x->repetir = $request->get('repetir');
            $x->revisar = $request->get('revisar');

            if($tipodato == 1){
                $x->ventero = $request->get('ventero');
            }elseif($tipodato == 2){
                $x->vdecimal = $request->get('vdecimal');
            }elseif($tipodato == 3){
                $x->vfecha = $request->get('vfecha');
            }elseif($tipodato == 4){
                $x->vbooleano = $request->get('vbooleano');
            }elseif($tipodato == 5){
                $x->vcadena = $request->get('vcadena');
            }
            
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

        $r = fnValor($ga->tipodato);
        $valor = $ga->$r;

        return view('catalogos.gpsalerta.edit', [
            'ga' => $ga,
            'mm' => $mm,
            'campo' => $campo,
            'campos' => $tp,
            'tv' => Tipovehiculo::all(),
            'valor' => $valor
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
        //dd($request);
        $validatedData = $request->validate([
            'gpsmarcamodelo_id' => 'required',
            'alerta' => 'required',
            'tipoalerta' => 'required',
            'camposgps_id' => 'required',
            'tipodato' => 'required',
            'funcion' => 'required'            
        ], [
            'gpsmarcamodelo_id.required' => 'El campo <i>Marca-Modelo</i> es obligatorio'
        ]);

        if($validatedData){
            $tipodato = $request->get('tipodato');
            $x = Gpsalerta::findOrFail($id);
            $x->gpsmarcamodelo_id = $request->get('gpsmarcamodelo_id');
            $x->alerta = strtoupper($request->get('alerta'));
            $x->tipoalerta = $request->get('tipoalerta');
            $x->tipovehiculo_id = $request->get('tipovehiculo_id');
            $x->camposgps_id = $request->get('camposgps_id');
            $x->tipodato = $request->get('tipodato');
            $x->funcion = $request->get('funcion');
            $x->repetir = $request->get('repetir');
            $x->revisar = $request->get('revisar');

            if($tipodato == 1){
                $x->ventero = $request->get('ventero');
            }elseif($tipodato == 2){
                $x->vdecimal = $request->get('vdecimal');
            }elseif($tipodato == 3){
                $x->vfecha = $request->get('vfecha');
            }elseif($tipodato == 4){
                $x->vbooleano = $request->get('vbooleano');
            }elseif($tipodato == 5){
                $x->vcadena = $request->get('vcadena');
            }
            
            $x->save();
            return redirect('cat_gpsalerta');
        }
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
        //dd($t);

        if($t != null){
            $t_id = $t->id;         // $tp = Trazaposicion::where('traza_id',$t_id)->get();
            $campos = Trazaposicion::where('traza_id',$t_id)->get();
        }else{
            $campos = collect([]);
        }

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

    public function valor(Request $request)            //ELIMINA EL ELEMENTO
    {        
        $tipodato = $request->get('tipodato');

        if($tipodato == 1){
            return view('catalogos.gpsalerta.ventero');
        }elseif($tipodato == 2){
            return view('catalogos.gpsalerta.vdecimal');
        }elseif($tipodato == 3){
            return view('catalogos.gpsalerta.vfecha');
        }elseif($tipodato == 4){
            return view('catalogos.gpsalerta.vbooleano');
        }elseif($tipodato == 5){
            return view('catalogos.gpsalerta.vcadena');
        }
    }
}

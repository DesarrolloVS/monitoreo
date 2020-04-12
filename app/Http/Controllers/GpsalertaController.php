<?php

namespace App\Http\Controllers;

use App\Camposgps;
use App\Gpsalerta;
use App\Gpsmarcamodelo;
use App\Parametros;
use App\Tipoconfiguracion;
use App\Tipovehiculo;
use App\Traza;
use App\Trazaposicion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GpsalertaController extends Controller
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
        return view('catalogos.gpsalerta.index', [
            'alertas' => Gpsalerta::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $gps = Gpsmarcamodelo::findOrFail($id);
        $alertasmm = Gpsalerta::where('gpsmarcamodelo_id', '=', $id)->get();

        return view('catalogos.alertasgpsmm.create',[
            'gps' => $gps,
            'alertasmm' => $alertasmm,
            'tvehic' => Tipovehiculo::all(),
            'tconf' => Tipoconfiguracion::all(),
            'camposgsp' => Camposgps::all(),
            'parametros' => Parametros::all()
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
        if ($request->get('tipoconfiguracion_id') == null)
        {
            request()->validate([
                'desc_corta' => 'required',
                'desc_mostrar' => 'required',
                'tipoconfiguracion_id' => 'required',
                'camposgps_id' => 'required',
            ]);
        }
        $tipoconf_v = strtoupper($request->get('tipoconfiguracion_id'));
        if($tipoconf_v == 1){
            request()->validate([
                'desc_corta' => 'required',
                'desc_mostrar' => 'required',
                'tipoconfiguracion_id' => 'required',
                'camposgps_id' => 'required',
            ]);
        }elseif($tipoconf_v == 2){
            if($request->get('parametro_sn') == 1){ //parametro = si
                request()->validate([
                    'desc_corta' => 'required',
                    'desc_mostrar' => 'required',
                    'tipoconfiguracion_id' => 'required',
                    'camposgps_id' => 'required',
                    'repetir' => 'required',
                    'parametros_id' => 'required',
                ]);
            }else{
                request()->validate([
                    'desc_corta' => 'required',
                    'desc_mostrar' => 'required',
                    'tipoconfiguracion_id' => 'required',
                    'camposgps_id' => 'required',
                    'repetir' => 'required',
                    'valor' => 'required',
                ]);
            }

        }elseif($tipoconf_v == 3 or $tipoconf_v == 4 or $tipoconf_v == 5  or $tipoconf_v == 6){
            if($request->get('parametro_sn') == 1){ //parametro = si
                request()->validate([
                    'desc_corta' => 'required',
                    'desc_mostrar' => 'required',
                    'tipoconfiguracion_id' => 'required',
                    'tipovehiculo_id' => 'required',
                    'camposgps_id' => 'required',
                    'repetir' => 'required',
                    'parametros_id' => 'required',
                ]);
            }else
            {
                request()->validate([
                        'desc_corta' => 'required',
                        'desc_mostrar' => 'required',
                        'tipoconfiguracion_id' => 'required',
                        'tipovehiculo_id' => 'required',
                        'camposgps_id' => 'required',
                        'repetir' => 'required',
                        'valor' => 'required',
                    ]);
            }

        }elseif($tipoconf_v == 7 or $tipoconf_v == 8 or $tipoconf_v == 9 or $tipoconf_v == 10){
            request()->validate([
                'desc_corta' => 'required',
                'desc_mostrar' => 'required',
                'tipoconfiguracion_id' => 'required',
                'camposgps_id' => 'required',
                'campo_cond' => 'required'
            ]);
        }
        DB::beginTransaction();
            $x = new Gpsalerta();
            //Todos
            $x->gpsmarcamodelo_id = $request->get('id_gps');
            $x->desc_corta = strtoupper($request->get('desc_corta'));
            $x->descripcion = strtoupper($request->get('desc_mostrar'));
            $x->tipoconfiguracion_id = strtoupper($request->get('tipoconfiguracion_id'));
            $x->camposgps_id = strtoupper($request->get('camposgps_id'));
            // tipo (2)
            if($tipoconf_v == 2 or $tipoconf_v == 3 or $tipoconf_v == 4 or $tipoconf_v == 5 or $tipoconf_v == 6){
                $x->repetir = $request->get('repetir');
                if($request->get('parametro_sn') == 1){ //parametro = si
                    $x->parametros_id = $request->get('parametros_id');
                    $x->pov = true;

                }else{
                    $x->valor = strtoupper($request->get('valor'));
                    $x->pov = false;
                }
            }
            if($tipoconf_v == 3 or $tipoconf_v == 4 or $tipoconf_v == 5 or $tipoconf_v == 6){
                $x->tipovehiculo_id = strtoupper($request->get('tipovehiculo_id'));
            }
            if($tipoconf_v == 7 or $tipoconf_v == 8 or $tipoconf_v == 9 or $tipoconf_v == 10){
                $x->campos_condicion = strtoupper($request->get('campo_cond'));
            }
            $x->estado = true;
            $x->save();
        DB::commit();

        return redirect("/cat_gpsmarcamodelo/".$request->get('id_gps')."/alertasgpsmm");
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
        //dd($id);
        $ga = Gpsalerta::findOrFail($id);
        //dd($ga);
        $gps = Gpsmarcamodelo::findOrFail($ga->gpsmarcamodelo_id);
        return view('catalogos.alertasgpsmm.edit', [
            'ga' => $ga,
            'gps' => $gps,
            'parametros' => Parametros::all()
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
        if ($request->get('tipoconfiguracion_id') == null or $request->get('tipoconfiguracion_id') == 1)
        {
            return redirect("/cat_gpsmarcamodelo/".$request->get('id_gps')."/alertasgpsmm");
        }
        $tipoconf_v = strtoupper($request->get('tipoconfiguracion_id'));

        if($tipoconf_v == 2){
            if($request->get('parametro_sn') == 1){ //parametro = si
                request()->validate([
                    'repetir' => 'required',
                    'parametros_id' => 'required',
                ]);
            }else{
                request()->validate([
                    'repetir' => 'required',
                    'valor' => 'required',
                ]);
            }
        }elseif($tipoconf_v == 3 or $tipoconf_v == 4 or $tipoconf_v == 5  or $tipoconf_v == 6){
            if($request->get('parametro_sn') == 1){ //parametro = si
                request()->validate([
                    'repetir' => 'required',
                    'parametros_id' => 'required',
                ]);
            }else
            {
                request()->validate([
                        'repetir' => 'required',
                        'valor' => 'required',
                    ]);
            }

        }elseif($tipoconf_v == 7 or $tipoconf_v == 8 or $tipoconf_v == 9 or $tipoconf_v == 10){
            request()->validate([
                'campo_cond' => 'required'
            ]);
        }

        DB::beginTransaction();
            $x = Gpsalerta::findOrFail($id);
            // tipo (2)
            if($tipoconf_v == 2 or $tipoconf_v == 3 or $tipoconf_v == 4 or $tipoconf_v == 5 or $tipoconf_v == 6){
                $x->repetir = $request->get('repetir');
                if($request->get('parametro_sn') == 1){ //parametro = si
                    $x->parametros_id = $request->get('parametros_id');
                    $x->pov = true;
                    $x->valor = null;

                }else{
                    $x->valor = strtoupper($request->get('valor'));
                    $x->pov = false;
                    $x->parametros_id = null;
                }
            }
            if($tipoconf_v == 7 or $tipoconf_v == 8 or $tipoconf_v == 9 or $tipoconf_v == 10){
                $x->campos_condicion = strtoupper($request->get('campo_cond'));
            }
            $x->save();
        DB::commit();

        return redirect("/cat_gpsmarcamodelo/".$request->get('id_gps')."/alertasgpsmm");
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
        return view('catalogos.alertasgpsmm.estatus', [
            'ga' => $ga
        ]);
    }

    public function update_estatus(Request $request, $id)
    {
        request()->validate([
            'estadoalerta' => 'required'
        ]);
        //dd($request);
        $ga = Gpsalerta::findOrFail($id);
        $ga->estado = $request->get('estadoalerta');
        $ga->save();
        return redirect("/cat_gpsmarcamodelo/".$request->get('id_gpsmm')."/alertasgpsmm");
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

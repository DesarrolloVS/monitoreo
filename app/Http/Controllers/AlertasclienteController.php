<?php

namespace App\Http\Controllers;

use App\Alertascliente;
use App\Cliente;
use App\Gpsalerta;
use App\Gpscliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AlertasclienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cliente.alertas.index', [
            'clientes' => Cliente::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function mm(Request $request)            // dd($request);
    {           
        $id_cliente = $request->get('id_cliente');
        $res = Gpscliente::where('cliente_id',$id_cliente)->get();

        return view('cliente.alertas.select', [
            'rs' => $res            
        ]);        
    }

    public function alertasmm(Request $request){            //dd($request);             
               
        $gpsmarcamodelo_id = $request->get('gpsmarcamodelo_id');            //dd($gpsmarcamodelo_id);
        $gpscliente_id = $request->get('gpscliente_id');
        //$alertas = Gpsalerta::where('gpsmarcamodelo_id',$gpsmarcamodelo_id)->get();
        $ac = Alertascliente::where('gpscliente_id',$gpscliente_id)->get();

        $alertas = DB::table('gpsalertas')
                   ->join('gpsmarcamodelos','gpsalertas.gpsmarcamodelo_id','=','gpsmarcamodelos.id')
                   ->join('camposgps','gpsalertas.camposgps_id','=','camposgps.id')
                   ->select('gpsalertas.id','gpsmarcamodelos.marca','gpsmarcamodelos.modelo','gpsalertas.alerta','camposgps.descripcion','gpsalertas.tipoalerta','gpsalertas.tipodato'
                   ,'gpsalertas.ventero','gpsalertas.vdecimal','gpsalertas.vfecha','gpsalertas.tipoalerta','gpsalertas.vbooleano','gpsalertas.vcadena','gpsalertas.repetir',
                   'gpsalertas.revisar','gpsalertas.aux')
                   ->where('gpsmarcamodelo_id',$gpsmarcamodelo_id)
                   ->get();

        $data = array();
        if($ac->first()){
            foreach($ac as $x){
                array_push($data,$x->gpsalerta_id);
            }
        }

        $arr = $alertas->toArray();         //dd($arr);

        foreach($arr as $k => $v){
            $alerta = $arr[$k]->id;
            
            if (in_array($alerta, $data)) {
                $arr[$k]->aux = 1;
            }else{
                $arr[$k]->aux = 0;
            }
        }

        $num_alertas = count($arr);
        
        return view('cliente.alertas.alertas', [
            'alertas' => $arr,
            'count' => $num_alertas
        ]);        
    }

    public function alertasupdate(Request $request){            //dd($request);             
               
        $alertas = $request->get('alertas');
        $count = $request->get('num_reg');
        $gpscliente_id = $request->get('gpscliente_id');

        $alert = explode(",",$alertas);

        $deletedRows = Alertascliente::where('gpscliente_id', $gpscliente_id)->delete();

        if($count != 0){
            foreach($alert as $k => $v){
                $new = new Alertascliente();
                $new->gpsalerta_id = $v;
                $new->gpscliente_id = $gpscliente_id;
                $new->save();
            }    
        }

        return redirect('/cat_alertasclientes');

    }
}

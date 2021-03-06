<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Cliente_tiposervicio;
use App\Estadocliente;
use App\Gpscliente;
use App\Gpsmarcamodelo;
use App\Gpsmarcamodelocte;
use App\Tipodomicilio;
use App\Tipoempresa;
use App\Tipopersona;
use App\Tiposervicio;
use App\Tipovehiculo;
use App\Usuario;
use App\Vehiculo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClienteController extends Controller
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
        return view('catalogos.cliente.index', [
            'clientes' => Cliente::all()->sortBy("id"),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.cliente.create',[
            'tps' => Tipopersona::all()->sortBy("id"),
            'tes' => Tipoempresa::all()->sortBy("id"),
            'tss' => Tiposervicio::all()->sortBy("id"),
            'estados' => Estadocliente::all()->sortBy("id"),
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
        request()->validate([
            'nombre' => 'required',
            'tipopersona_id' => 'required',
            'rfc' => 'required',
            'tipoempresa_id' => 'required',
            'estadocliente_id' => 'required',
            'tiposervicio_id' => 'required'
        ]);

        DB::beginTransaction();
        $cliente = new Cliente();

        //GESTION DEL ARCHIVO
        if($request->hasFile('logo')){
            $file =  $request->file('logo');
            $name = time().$file->getClientOriginalName();
            if($file->move(public_path().'/logos',$name)){
                $cliente->logo = $name;
            }
        }

        $cliente->nombre = strtoupper($request->get('nombre'));
        $cliente->tipopersona_id = $request->get('tipopersona_id');
        $cliente->rfc = strtoupper($request->get('rfc'));
        $cliente->estadocliente_id = $request->get('estadocliente_id');
        $cliente->tipoempresa_id = strtoupper($request->get('tipoempresa_id'));
        $cliente->save();
        $id_cliente = $cliente->id;

        $servicios = $request->get('tiposervicio_id');
        foreach ($servicios as $servicio => $s) {
            /*
            DB::table('cliente_tiposervicio')
                ->insert([
                    ['cliente_id' => $id_cliente, 'tiposervicio_id' => $s]
                ]);
            */
            $c_ts = new Cliente_tiposervicio();
            $c_ts->cliente_id = $id_cliente;
            $c_ts->tiposervicio_id = $s;
            $c_ts->save();
        }

        DB::commit();

        return redirect('cat_clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "entraste a show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $servicios = DB::table('cliente_tiposervicio')
        ->where('cliente_id',$id)
        ->get();

        //dd($servicios);

        $con = $servicios->count();
        $services = array();
        if($con > 0){
            foreach($servicios as $s){
                $services[$s->tiposervicio_id] = 1;
            }
        }           //dd($services);

        //dd(Tiposervicio::all());

        $cliente = Cliente::findOrFail($id);
        return view('catalogos.cliente.edit', [
            'tps' => Tipopersona::all()->sortBy("id"),
            'tes' => Tipoempresa::all()->sortBy("id"),
            'tss' => Tiposervicio::all()->sortBy("id"),
            'estados' => Estadocliente::all()->sortBy("id"),
            'cliente' => $cliente,
            'services' => $services
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
            'nombre' => 'required',
            'tipopersona_id' => 'required',
            'rfc' => 'required',
            'tipoempresa_id' => 'required',
            'estadocliente_id' => 'required',
            'tiposervicio_id' => 'required'
        ]);

        DB::beginTransaction();
        $cliente = Cliente::findOrFail($id);

        //GESTION DEL ARCHIVO
        if($request->hasFile('logo')){
            $file =  $request->file('logo');
            $name = time().$file->getClientOriginalName();
            if($file->move(public_path().'/logos',$name)){
                $cliente->logo = $name;
            }
        }

        $cliente->nombre = strtoupper($request->get('nombre'));
        $cliente->tipopersona_id = $request->get('tipopersona_id');
        $cliente->rfc = strtoupper($request->get('rfc'));
        $cliente->usuario_id = strtoupper($request->get('usuario_id'));
        $cliente->tipoempresa_id = strtoupper($request->get('tipoempresa_id'));
        $cliente->estadocliente_id = $request->get('estadocliente_id');
        $cliente->save();
        $id_cliente = $cliente->id;

        DB::table('cliente_tiposervicio')
            ->where('cliente_id', $id_cliente)->delete();

        $servicios = $request->get('tiposervicio_id');

        if($servicios != null){
            foreach ($servicios as $servicio => $s) {
                DB::table('cliente_tiposervicio')
                    ->insert([
                        ['cliente_id' => $id_cliente, 'tiposervicio_id' => $s]
                    ]);
            }
        }



        DB::commit();

        return redirect('cat_clientes');
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

    public function domicilios($id)            //ELIMINA EL ELEMENTO
    {
        $cliente = Cliente::findOrFail($id);
        $doms = DB::table('domicilios')
        ->where('cliente_id',$id)
        ->orderBy('id', 'ASC')
        ->get();            //dd($doms);

        return view('catalogos.domicilios.index', [
            'cliente' => $cliente,
            'domicilios' => $doms
        ]);
    }

    public function estatus($id)            //ELIMINA EL ELEMENTO
    {
        $cliente = Cliente::findOrFail($id);
        $edocliente = $cliente->estadocliente_id;
        $edocte = DB::table('estadoclientes')
        ->where('id',$edocliente)
        ->get();
        //dd($edocte);
        return view('cliente.estatus', [
            'cliente' => $cliente,
            'edocte' => $edocte->first(),
            'estados' => Estadocliente::all()
        ]);
    }

    public function update_estatus(Request $request, $id)
    {
        request()->validate([
            'estadocliente_id' => 'required'
        ]);

        DB::beginTransaction();
        $cliente = Cliente::findOrFail($id);
        $cliente->estadocliente_id = $request->get('estadocliente_id');
        $cliente->save();
        DB::commit();
        return redirect('cat_clientes');
    }

    public function parametroscte($id)
    {
        $cliente = Cliente::findOrFail($id);
        $params = DB::table('parametrosclientes')
        ->where('cliente_id',$id)
        ->orderBy('id', 'ASC')
        ->get();            //dd($doms);

        return view('catalogos.parametroscte.index', [
            'cliente' => $cliente,
            'params' => $params
        ]);
    }

    public function vehiculoscte($id)
    {
        $cliente = Cliente::findorFail($id);
        $vehiculos = Vehiculo::where('cliente_id',$id)
        ->orderBy('id', 'ASC')
        ->get();

        return view('catalogos.vehiculoscte.index', [
            'cliente' => $cliente,
            'vehiculos' => $vehiculos
        ]);
    }

    public function gpsscte($id)
    {
        $cliente = Cliente::findorFail($id);
        $nombre = $cliente->nombre;
        $gps = Gpscliente::where('cliente_id',$id)
        ->orderBy('id', 'ASC')
        ->get();

        return view('catalogos.gpscliente.index2', [
            'gps' => $gps,
            'clientes' => Cliente::all(),
            'cliente_id' => $id,
            'nombre' => $nombre
        ]);
    }

    public function usuarioscte($id)
    {
        $cliente = Cliente::findorFail($id);
        $nombre = $cliente->nombre;
        $usuarios = User::where('cliente_id',$id)
        ->orderBy('id', 'ASC')
        ->get();
        return view('catalogos.usuarioscte.index', [
            'usuarios' => $usuarios,
            'cliente' => $cliente,
            'cliente_id' => $id,
            'nombre' => $nombre
        ]);
    }

    public function gpsmmcte($id)
    {
        $cliente = Cliente::findOrFail($id);
        $gpsmmcte = Gpsmarcamodelocte::where('cliente_id',$id)
        ->orderBy('id', 'ASC')
        ->get();

        return view('catalogos.gpsmmcte.index', [
            'cliente' => $cliente,
            'gpsmmcte' => $gpsmmcte
        ]);
    }

}

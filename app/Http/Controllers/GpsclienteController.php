<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Routing\Redirector;
use App\Gpscliente;
use App\Gpsmarcamodelo;
use App\Cliente;
use App\Estadogpscliente;

class GpsclienteController extends Controller
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
    public function index($cliente_id = ""){            //print_r($_GET);

        if($cliente_id != 0){
            $cliente = Cliente::findorFail($cliente_id);
            $nombre = $cliente->nombre;
            $gps = Gpscliente::where('cliente_id',$cliente_id)->get();
        }else{
            $cliente_id = "";
            $nombre = "";
            $gps = Gpscliente::all();
        }

        return view('catalogos.gpscliente.index', [
            'gps' => $gps,
            'clientes' => Cliente::all(),
            'cliente_id' => $cliente_id,
            'nombre' => $nombre
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cliente_id = ""){
        $cliente_id = $cliente_id;
        $cliente = Cliente::findorFail($cliente_id);
        $nombre = $cliente->nombre;
        $mm = Gpsmarcamodelo::all();;
        return view('catalogos.gpscliente.create',[
            'clientes' => Cliente::all(),
            'cliente_id' => $cliente_id,
            'nombre' => $nombre,
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
        request()->validate([
            'gpsmarcamodelo_id' => 'required',
            'serie' => 'required',
            'imei' => 'required',
            'puerto' => 'required',
            'sincronizacion' => 'required'
        ]);
        $gps = new Gpscliente();
        $gps->serie = strtoupper($request->get('serie'));
        $gps->imei = strtoupper($request->get('imei'));
        $gps->puerto = strtoupper($request->get('puerto'));
        $gps->sincronizacion = strtoupper($request->get('sincronizacion'));
        $gps->gpsmarcamodelo_id = strtoupper($request->get('gpsmarcamodelo_id'));
        $gps->cliente_id = strtoupper($request->get('id_cliente'));

        $gps->save();
        //return redirect('cat_gpscliente');
        //Route::get('/cat_gpscliente/index/{id}', 'GpsclienteController@index');
        return redirect("/cat_clientes/".$request->get('id_cliente')."/gpsscte");
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
    public function edit($id, $cliente)
    {
        $client = Cliente::findorFail($cliente);
        $nombre = $client->nombre;
        $gps = Gpscliente::findOrFail($id);
        //dd($gps);
        return view('catalogos.gpscliente.edit',[
            'gps' => $gps,
            //'clientes' => Cliente::all(),
            'cliente_id' => $cliente,
            'mm' => Gpsmarcamodelo::all(),
            'nombre' => $nombre
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
            'gpsmarcamodelo_id' => 'required',
            'serie' => 'required',
            'imei' => 'required',
            'puerto' => 'required',
            'sincronizacion' => 'required'
        ]);
        $gps = Gpscliente::findOrFail($id);
        $gps->serie = strtoupper($request->get('serie'));
        $gps->imei = strtoupper($request->get('imei'));
        $gps->puerto = strtoupper($request->get('puerto'));
        $gps->sincronizacion = strtoupper($request->get('sincronizacion'));
        $gps->gpsmarcamodelo_id = strtoupper($request->get('gpsmarcamodelo_id'));
        //$gps->cliente_id = strtoupper($request->get('cliente_id'));

        $gps->save();
        return redirect("/cat_clientes/".$request->get('id_cliente')."/gpsscte");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $gps = Gpscliente::findOrFail($id);
        $gps->delete();
        //return redirect('cat_gpscliente');
        return redirect()->route('cat_gpscliente.indexx',['id' => $request->get('id_cliente')]);
    }

    public function form()
    {
        return view('catalogos.gpscliente.form', [
            'mm' => Gpsmarcamodelo::all(),
        ]);
    }

    public function estatus($id, $cliente)
    {
        $gps = Gpscliente::findOrFail($id);

        return view('catalogos.gpscliente.estatus', [
            'gps' => $gps,
            'estados' => Estadogpscliente::all(),
            'cliente' => Cliente::findorFail($cliente)
        ]);
    }

    public function update_estatus(Request $request, $id)
    {
        request()->validate([
            'estadogpscliente_id' => 'required'
        ]);
        $gps = Gpscliente::findOrFail($id);
        $gps->estadogpscliente_id = $request->get('estadogpscliente_id');
        $gps->save();
        return redirect("/cat_clientes/".$request->get('id_cliente')."/gpsscte");
    }

    public function confirmDelete($id,$cliente)            //ELIMINA EL ELEMENTO
    {
        $gps = Gpscliente::findOrFail($id);
        return view('catalogos.gpscliente.confirmDelete',[
            'gps' => $gps,
            'cliente_id' => $cliente
        ]);
    }
}

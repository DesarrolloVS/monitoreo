<?php

namespace App\Http\Controllers;

//use App\Cliente;
use App\Parametros;
use Illuminate\Http\Request;

class ParametrosController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('accesous: 1, 1, 2,admin,superuser');
        //$this->middleware('roles:admin,superuser');
    }

    public function index(){

        $pc = Parametros::all()->sortBy("id");
;

        return view('catalogos.parametros.index',[
            'pc' => $pc
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.parametros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)         //dd($request);
    {
        $validatedData = $request->validate([
            'parametro' => 'required',
            'descripcion' => 'required',
            'valor' => 'required|integer'
        ]);

        if($validatedData){
            $p =  new Parametros();
            $p->parametro = strtoupper($request->get('parametro'));
            $p->descripcion = strtoupper($request->get('descripcion'));
            $p->valor = $request->get('valor');
            $p->save();

            return redirect('/cat_parametros');

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
        $pc = Parametros::findOrFail($id);

        return view('catalogos.parametros.edit', [
            'pc' => $pc
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
        $validatedData = $request->validate([
            'parametro' => 'required',
            'descripcion' => 'required',
            'valor' => 'required|integer'
        ]);

        if($validatedData){
            $p = Parametros::findOrFail($id);
            $p->parametro = strtoupper($request->get('parametro'));
            $p->descripcion = strtoupper($request->get('descripcion'));
            $p->valor = $request->get('valor');
            $p->save();

            return redirect('/cat_parametros');
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
        $pc = Parametros::findOrFail($id);
        $pc->delete();
        return redirect()->route('cliente/parametros');
    }

    // public function parametros(Request $request)
    // {
    //     $id_cliente = $request->get('id_cliente');
    //     $pc = Parametroscliente::where('cliente_id','=',$id_cliente)->get();

    //     return view('catalogos.parametroscliente.filtro',[
    //         'pc' => $pc,
    //         'id' => $id_cliente
    //     ]);
    // }

public function estatus($id)
    {
        $params = Parametros::findOrFail($id);

        return view('catalogos.parametros.estatus', [
            'params' => $params
        ]);
    }

    public function estatusupd(Request $request, $id)
    {
        request()->validate([
            'estadoparam' => 'required'
        ]);
        $gps = Parametros::findOrFail($id);
        $gps->estado = $request->get('estadoparam');
        $gps->save();

        return redirect('/cat_parametros');
    }


    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {
        $pc = Parametros::findOrFail($id);
        return view('catalogos.parametros.confirmDelete',[
            'x' => $pc
        ]);
    }
}

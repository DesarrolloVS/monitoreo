<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Parametroscliente;
use Illuminate\Http\Request;

class ParametrosclienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('id_cliente')) {
            $id_cliente = ($request->get('id_cliente'));
        }else{
            $id_cliente = "";
        }
        return view('catalogos.parametroscliente.index', [
            'clientes' => Cliente::all(),
            'id_cliente' => $id_cliente
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $c = Cliente::findOrFail($id);
        return view('catalogos.parametroscliente.create', [
            'cliente' => $c
        ]);
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
            'cliente_id' => 'required',
            'parametro' => 'required',
            'descripcion' => 'required',
            'valor' => 'required|integer'
        ]);

        if($validatedData){
            $p =  new Parametroscliente();
            $p->cliente_id = $request->get('cliente_id');
            $p->parametro = $request->get('parametro');
            $p->descripcion = strtoupper($request->get('descripcion'));
            $p->valor = $request->get('valor');
            $p->save();

            return redirect()->route('cliente/parametros', ['id_cliente' => $request->get('cliente_id')]);
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
        $pc = Parametroscliente::findOrFail($id);
        $id_cliente = $pc->cliente_id;
        $c = Cliente::findOrFail($id_cliente);

        return view('catalogos.parametroscliente.edit', [
            'pc' => $pc,
            'cliente' => $c
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
            'cliente_id' => 'required',
            'parametro' => 'required',
            'descripcion' => 'required',
            'valor' => 'required|integer'
        ]);

        if($validatedData){
            $p = Parametroscliente::findOrFail($id);
            $p->cliente_id = $request->get('cliente_id');
            $p->parametro = $request->get('parametro');
            $p->descripcion = strtoupper($request->get('descripcion'));
            $p->valor = $request->get('valor');
            $p->save();

            return redirect()->route('cliente/parametros', ['id_cliente' => $request->get('cliente_id')]);
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
        $pc = Parametroscliente::findOrFail($id);
        $id_cliente = $pc->cliente_id;
        $pc->delete();
        return redirect()->route('cliente/parametros', ['id_cliente' => $id_cliente]);
    }

    public function parametros(Request $request)            //ELIMINA EL ELEMENTO
    {        
        $id_cliente = $request->get('id_cliente');
        $pc = Parametroscliente::where('cliente_id','=',$id_cliente)->get();

        return view('catalogos.parametroscliente.filtro',[
            'pc' => $pc,
            'id' => $id_cliente
        ]);
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $pc = Parametroscliente::findOrFail($id);
        return view('catalogos.parametroscliente.confirmDelete',[
            'x' => $pc
        ]);
    }
}

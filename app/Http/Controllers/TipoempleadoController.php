<?php

namespace App\Http\Controllers;
use App\Tipoempleado;
use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\DB;

class TipoempleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.tipoempleados.index', [
            'tipoempleados' => Tipoempleado::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.tipoempleados.create',[
            'clientes' => Cliente::all()
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
        DB::beginTransaction();
        $te = new Tipoempleado();

        $te->cliente_id = $request->get('cliente_id');
        $te->descripcion = strtoupper($request->get('descripcion'));
        $te->save();
        DB::commit();
        return redirect('cat_tipoempleados');
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
        $te = Tipoempleado::findOrFail($id);
        return view('catalogos.tipoempleados.edit', [
            'te' => $te,
            'clientes' => Cliente::all()
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
        DB::beginTransaction();
        $te = Tipoempleado::findOrFail($id);
        $te->cliente_id = $request->get('cliente_id');
        $te->descripcion = strtoupper($request->get('descripcion'));
        $te->save();
        DB::commit();
        return redirect('cat_tipoempleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $te = Tipoempleado::findOrFail($id);
        $te->delete();
        return redirect('/cat_tipoempleados');
    }

    public function confirmDelete($id)            //ELIMINA EL ELEMENTO
    {        
        $te = Tipoempleado::findOrFail($id);
        return view('catalogos.tipoempleados.confirmDelete',[
            'te' => $te
        ]);
    }

    public function select(Request $request)            //ELIMINA EL ELEMENTO
    {        
        $id_cliente = $request->get('id_cliente');
        $tes = Tipoempleado::where('cliente_id','=',$id_cliente)->get();

        //dd($tes);

        return view('usuario.select',[
            'tes' => $tes
        ]);
    }
}

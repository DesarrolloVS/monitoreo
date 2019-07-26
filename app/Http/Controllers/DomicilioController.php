<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Tipodomicilio;
use App\Domicilio;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DomicilioController extends Controller
{
    public function create($id)
    {

        $cliente = Cliente::findOrFail($id);
        return view('catalogos.domicilios.create',[
            'cliente' => $cliente,
            'tds' => Tipodomicilio::all(),
        ]);
    }

    public function store($id, Request $request)
    {   
        //dd($request);
        $id_cliente = $id;
        $domicilio = new Domicilio();
        $domicilio->calle = strtoupper($request->get('calle'));   
        $domicilio->exterior = strtoupper($request->get('exterior'));   
        $domicilio->interior = strtoupper($request->get('interior'));   
        $domicilio->colonia = strtoupper($request->get('colonia'));   
        $domicilio->cp = strtoupper($request->get('cp'));   
        $domicilio->estado = strtoupper($request->get('estado'));   
        $domicilio->ciudad = strtoupper($request->get('ciudad'));
        $domicilio->cliente_id = $id_cliente;
        $domicilio->tipodomicilio_id = $request->get('tipodomicilio_id');
        $domicilio->save();

        $url = "cat_clientes/{$id_cliente}/domicilios";
        return redirect ($url);
        
    }

    public function edit($id)
    {
        $dom = Domicilio::findOrFail($id);
        return view('catalogos.domicilios.edit', [
            'domicilio' => $dom,
            'tds' => Tipodomicilio::all()
        ]);
    }

    public function update(Request $request, $id)
    {   
        DB::beginTransaction();
        $dom = Domicilio::findOrFail($id);
        
        $dom->calle = strtoupper($request->get('calle'));
        $dom->exterior = strtoupper($request->get('exterior'));
        $dom->interior = strtoupper($request->get('interior'));
        $dom->colonia = strtoupper($request->get('colonia'));
        $dom->cp = strtoupper($request->get('cp'));
        $dom->estado = strtoupper($request->get('estado'));
        $dom->ciudad = strtoupper($request->get('ciudad'));
        $dom->tipodomicilio_id = $request->get('tipodomicilio_id');

        $dom->save();
        DB::commit();

        $url = "cat_clientes/{$dom->cliente_id}/domicilios";
        return redirect ($url);
        
    }
}

<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Parametros;
use App\Parametroscliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParametroscteController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('accesous: 1, 1, 2,admin,superuser');
        //$this->middleware('roles:admin,superuser');
    }

    public function create($id)
    {
        $cliente = Cliente::findOrFail($id);

        $parametroscte = DB::table('parametrosclientes')
        ->where('cliente_id',$id)
        ->get();
        $conpcte = $parametroscte->count();

        $parametrossys = DB::table('parametros')
        ->where('estado',true)
        ->get();

        if ($conpcte == 0) {
            //dd($parametrossys);
            foreach ($parametrossys as $paramsys) {
                $p_cte = new Parametroscliente();
                $p_cte->cliente_id = $id;
                $p_cte->parametro_id = $paramsys->id;
                $p_cte->parametro = $paramsys->parametro;
                $p_cte->descripcion = $paramsys->descripcion;
                $p_cte->valor = $paramsys->valor;
                $p_cte->activo_cliente = $paramsys->estado;
                $p_cte->save();
            }

        } else {
            foreach ($parametrossys as $paramsys) {
                $paramcte1 = DB::table('parametrosclientes')
                ->where('cliente_id',$id)
                ->where('parametro_id', $paramsys->id)
                ->get();
                $conexcte = $paramcte1->count();
                if ($conexcte == 0) {
                    $p_cte = new Parametroscliente();
                    $p_cte->cliente_id = $id;
                    $p_cte->parametro_id = $paramsys->id;
                    $p_cte->parametro = $paramsys->parametro;
                    $p_cte->descripcion = $paramsys->descripcion;
                    $p_cte->valor = $paramsys->valor;
                    $p_cte->activo_cliente = $paramsys->estado;
                    $p_cte->save();
                }
            }
        }

        $url = "cat_clientes/{$id}/parametroscte";
        return redirect ($url);
    }

    public function edit($id)
    {
        $paramcte = Parametroscliente::findOrFail($id);
        return view('catalogos.parametroscte.edit', [
            'paramcte' => $paramcte,
        ]);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'valor' => 'required'
        ]);

        DB::beginTransaction();
        $paramcte = Parametroscliente::findOrFail($id);
        $paramcte->valor = $request->get('valor');
        $paramcte->save();
        DB::commit();

        $url = "cat_clientes/{$paramcte->cliente_id}/parametroscte";
        return redirect ($url);

    }
}
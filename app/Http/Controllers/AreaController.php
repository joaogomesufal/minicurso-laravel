<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return response()->json($areas);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $resultado = Area::create($dados);
        return response()->json($resultado);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ministrante = Ministrante::find($id);
        if(!empty($ministrante)) {
            return response()->json($ministrante);
        }
        return null;
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
        $ministrante = Ministrante::find($id);
        $dados = $request->all();
        if(!empty($ministrante)) {
            $ministrante->update($dados);
        }
        return response()->json($ministrante);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ministrante = Ministrante::find($id);
        if(!empty($ministrante)) {
            $ministrante->delete();
            return response()->json('Ministrante removido com sucesso!');
        }
        return response()->json('Ministrante não encontrado!');
    }
}

<?php

use Illuminate\Http\Request;
use App\Models\Ministrante;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('ministrantes', function () {
    $ministantes = Ministrante::all();
    return response()->json($ministantes);
});

Route::post('ministrantes', function (Request $request) {
    $dados = $request->all();
    $resultado = Ministrante::create($dados);
    return response()->json($resultado);
});

Route::put('ministrantes/{id}', function (Request $request, $id) {
    $ministrante = Ministrante::find($id);
    $dados = $request->all();
    if(!empty($ministrante)) {
        $ministrante->update($dados);
    }
    return response()->json($ministrante);
});

Route::get('ministrantes/{id}', function($id) {
    $ministrante = Ministrante::find($id);
    if(!empty($ministrante)) {
        return response()->json($ministrante);
    }
    return null;
});

Route::delete('ministrantes/{id}', function($id) {
    $ministrante = Ministrante::find($id);
    if(!empty($ministrante)) {
        $ministrante->delete();
        return response()->json('Ministrante removido com sucesso!');
    }
    return response()->json('Ministrante não encontrado!');
});

Route::resources([
    'areas' => 'AreaController',
    'palestras' => 'PalestraController'
]);

Route::get('palestras/{id}/ministrante', function($id) {

    $palestra = App\Models\Palestra::find($id)->with('ministrante');
    return response()->json($palestra);
});
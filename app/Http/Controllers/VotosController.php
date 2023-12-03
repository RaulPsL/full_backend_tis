<?php

namespace App\Http\Controllers;

use App\Models\Votos;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class VotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votos = Votos::with(['convocatoria', 'frente'])->get();
        return response()->json($votos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_mesa' => 'required|integer',
            'id_frente' => 'required|integer',
            'id_conv' => 'required|integer',
            'votos' => 'required|integer',
        ]);
        $votos = new Votos([
            'id_mesa' => $request->input('id_mesa'),
            'id_conv' => $request->input('id_conv'),
            'id_frente' => $request->input('id_frente'),
            'votos' => $request->input('votos'),
        ]);

        $votos->save();

        return response()->json($votos, 201);
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
        $request->validate([
            'votos' => 'required|integer',
        ]);

        $voto = Votos::findOrFail($id);

        $voto->update([
            'votos' => $request->input('votos'),
        ]);

        return response()->json($voto, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voto = Votos::findOrFail($id);
        $voto->delete();

        return response()->json(null, 204);
    }
}
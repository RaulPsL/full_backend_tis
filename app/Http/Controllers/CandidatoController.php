<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Relacion_ELECC_FRENTE;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Candidato::all();
        return response()->json($candidatos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        foreach ($data as $candidato) {
            $nuevo_candidato = Candidato::create($candidato);
            $relacion_elecc_frente = new Relacion_ELECC_FRENTE([
                'ID_FRENTE'=> $candidato['relacion_elecc_frente']['ID_FRENTE'],
                'ID_ELECCION'=> $candidato['relacion_elecc_frente']['ID_ELECCION'],
            ]);
            $nuevo_candidato->frente()->save($relacion_elecc_frente);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = json_decode($request->getContent(), true);
        $usuario = Candidato::find($id);
        $usuario->update([
            'CARGO' => $data['CARGO']
        ]);
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
}
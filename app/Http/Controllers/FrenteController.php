<?php

namespace App\Http\Controllers;

use App\Models\Frente;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FrenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frentes = Frente::with(['relacion_elecc_frente.eleccion.relacion_eleccconvo.relacion_fc.facultad',
                                 'relacion_candi_frente.usuario'])->get();
        return response()->json($frentes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'NOMBRE_FRENTE' => 'required',
            'LOGO_FRENTE'=>'required',
            'ACTIVO'=>'required',
        ]);

        Frente::create($validate_data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $frente = Frente::find($id);
        return response()->json($frente);
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
        $usuario = Frente::find($id);
        $usuario->update([
            'ID_CONVOCATORIA' => $data['ID_CONVOCATORIA']
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
        $frente = Frente::destroy($id);
        return response()->json($frente);
    }
}
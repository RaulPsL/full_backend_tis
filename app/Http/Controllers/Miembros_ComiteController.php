<?php

namespace App\Http\Controllers;

use App\Models\Miembros_Comite;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Miembros_ComiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comite  = Miembros_Comite::with(['relacion_usuario.relacion_uc.carrera.facultad',
                                          'relacion_usuario.cargo'])->get();
        return response()->json($comite);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $miembro = $request->validate([
            'ID_USUARIO' => 'required',
            'ID_CONVOCATORIA' => 'required',
            'ESTADO' => 'required',
        ]);
        Miembros_Comite::create($miembro);
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
        $usuario = Miembros_Comite::find($id);
        $usuario->update([
            'ID_USUARIO'=> $data['ID_USUARIO'],
            'ID_CONVOCATORIA' => $data['ID_CONVOCATORIA'],
            'ESTADO' => $data['CARGO']
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
        $usuario = Miembros_Comite::find($id);
        $usuario->delete();
    }
}

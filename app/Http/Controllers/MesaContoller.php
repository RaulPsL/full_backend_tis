<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MesaContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesas = Mesa::with([
            'relacion_jurado.relacion_uj.cargo',
            'relacion_convj',
            'relacion_fj',
            'relacion_cj'])->get();;
        return response()->json($mesas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // Validar el request para asegurar que tiene el formato correcto
        $request->validate([
            'votos' => 'required|numeric', // Ajusta las reglas de validación según tus necesidades
        ]);

        // Buscar la mesa por su ID
        $mesa = Mesa::find($id);

        // Verificar si la mesa existe
        if (!$mesa) {
            return response()->json(['error' => 'Mesa no encontrada'], 404);
        }

        // Actualizar el campo "VOTOS" con el valor proporcionado en el request
        $mesa->VOTOS = $request->input('votos');
        $mesa->save();

        // Retornar la respuesta con la mesa actualizada
        return response()->json($mesa);
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
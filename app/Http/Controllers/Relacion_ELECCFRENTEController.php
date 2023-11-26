<?php

namespace App\Http\Controllers;

use App\Models\Relacion_ELECC_FRENTE;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Relacion_ELECCFRENTEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relaciones = Relacion_ELECC_FRENTE::all();
        return response()->json($relaciones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $relacion_elecc_frente = $request->validate([
            'ID_FRENTE'=> 'required',
            'ID_ELECCION'=> 'required',
        ]);
        Relacion_ELECC_FRENTE::create($relacion_elecc_frente);
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
        //
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

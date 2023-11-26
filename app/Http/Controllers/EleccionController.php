<?php

namespace App\Http\Controllers;

use App\Models\Eleccion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EleccionController extends Controller
{
    /**
     * Retornara una promesa json para poder iterarlo mediante la relacion:
     * relacion_eleccconvo => ID_ELECCION
     * relacion_eleccconvo => ID_CONVOCATORIA
     * relacion_fc => ID_ELECCION
     * relacion_fc => ID_FACULTAD
     * mandando un arreglo de arreglos con objetos
     * mandar al postman la ruta de api.php para mejor vista de relaciones
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elecicones = Eleccion::with(['relacion_eleccconvo.relacion_fc.facultad'])->get();
        return response()->json($elecicones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $eleccion = $request->validate([
            'TIPO_ELECCION'=>'required',
            'ACTIVO'=>'required']);
        Eleccion::create($eleccion);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eleccion = Eleccion::find($id);
        return response()->json($eleccion);
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
        $eleccion = Eleccion::findOrFail($id);
        $eleccion->TIPO_ELECICON = $request->TIPO_ELECCION;
        $eleccion->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eleccion = Eleccion::destroy($id);
        return response()->json($eleccion);
    }
}

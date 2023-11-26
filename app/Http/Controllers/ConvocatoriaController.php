<?php

namespace App\Http\Controllers;

use App\Models\Convocatoria;
use App\Models\Facultad;
use App\Models\Relacion_CC;
use App\Models\Relacion_FC;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convocatorias = Convocatoria::with(['relacion_fc.facultad.carrera', 'relacion_elecc_conv', 'relacion_conv_frente'])->get();
        return response()->json($convocatorias);
    }
    
    /**
     * Al igual que tener una relacion en lugar de realizar un trigger
     * este integra la relacion como $relacion_fc integrando en la tabla
     * el ID_FACULTAD y ID_CONVOCATORIA sacando del objeto relacion_fc
     * del $request->validate
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $validate_data = $request->validate([
            'ID_ELECCION' => 'required',
            'FECHA_INI' => 'required',
            'FECHA_FIN' => 'required',
            'DIA_ELECCION' => 'required',
            'NOMBRE_CONVOCATORIA' => 'required',
            'ACTIVO'=>'required',
            'URL_PDF_CONVOCATORIA' => 'required',
            'relacion_fc' => 'required',
            'relacion_cc' => 'required'
        ]);

        $convocatoria = Convocatoria::create($validate_data);
        $facultades = Facultad::with(['carrera'])->get();
        if(!empty($validate_data['relacion_cc'])){
            foreach ($validate_data['relacion_fc'] as $relacion) {
                $relacion['ID_CONVOCATORIA'] = $convocatoria->ID_CONVOCATORIA;
                Relacion_FC::create($relacion);
                foreach ($validate_data['relacion_cc'] as $relacion) {
                    $relacion['ID_ELECCION'] = $validate_data['ID_ELECCION'];
                    Relacion_CC::create($relacion);
                }
            }
        }else{
            foreach ($validate_data['relacion_fc'] as $facultad) {
                $facultad['ID_CONVOCATORIA'] = $convocatoria->ID_CONVOCATORIA;
                Relacion_FC::create($facultad);
            }
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
        $convocatoria = Convocatoria::find($id);
        return response()->json($convocatoria);
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
        $convocatoria = Convocatoria::findOrFail($id);
        $convocatoria->ID_ELECCION = $request->ID_ELECCION;
        $convocatoria->FECHA_INI = $request->FECHA_INI;
        $convocatoria->FECHA_FIN = $request->FECHA_FIN;
        $convocatoria->URL_PDF_CONVOCATORIA = $request->URL_PDF_CONVOCATORIA;
        $convocatoria->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $convocatoria = Convocatoria::destroy($id);
        return response()->json($convocatoria);
    }
}
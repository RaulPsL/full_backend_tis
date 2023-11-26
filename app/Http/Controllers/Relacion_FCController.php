<?php

namespace App\Http\Controllers;

use App\Models\Relacion_FC;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Relacion_FCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relacion = Relacion_FC::with([
            'facultad', 
            'convocatoria' => function($query){
                $query->where('NOMBRE_CONVOCATORIA', 'HONORABLE CONSEJO FACULTATIVO');
            }])->get();
        return $relacion;
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

<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::with(['cargo', 'relacion_uc.carrera.facultad', 'relacion_tu.telefono'])->get();
        return response()->json($usuarios);
    }

    public function index_ids($cargo, $id_car)
    {
        $usuarios = Usuario::whereHas(
            'cargo', function($query) use($cargo){
                $query->where('NOMBRE_CARGO', $cargo);
            })->whereHas(
                'relacion_uc.carrera', function($query) use($id_car){
                    $query->where('ID_CARRERA', $id_car);
                }
            )->pluck('ID_USUARIO');
        return response()->json($usuarios);
    }

    public function index_docentes()
    {
        $usuarios = Usuario::with([
            'cargo', 
            'relacion_uc.carrera.facultad', 
            'relacion_tu.telefono'])
            ->whereHas('cargo', function ($query){
                $query->where('NOMBRE_CARGO', 'Docente');
            })->get();
        return response()->json($usuarios);
    }

    public function index_estudiantes()
    {
        $usuarios = Usuario::with([
            'cargo' => function ($query){
                $query->where('NOMBRE_CARGO', 'Estudiante');
            }, 
            'relacion_uc.carrera.facultad', 
            'relacion_tu.telefono'])->get();
        return response()->json($usuarios);
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
    public function show(Request $request)
    {
        $nombreUsuario = $request->input('NOMBRE_USUARIO');
        $apellidoUsuario = $request->input('APELLIDO_USUARIO');

        $usuario = Usuario::where('NOMBRE_USUARIO', $nombreUsuario)
            ->where('APELLIDO_USUARIO', $apellidoUsuario)
            ->get();

        return response()->json($usuario);
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

<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Jurado;
use App\Models\Mesa;
use App\Models\Miembros_Comite;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class JuradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_data = Jurado::with(['relacion_uj.cargo'])->get();
        return $show_data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jurado = $request->validate([
            'ID_USUARIO' => 'required',
            'ID_CONVOCATORIA'=>'required',
            'ID_CARRERA' => 'required',
            'ID_FACULTAD' => 'required'
        ]);
        Jurado::create($jurado);
    }

    /**
     * 
     */
    public function storeJurado(Request $request){
        $data = json_decode($request->getContent(), true);
        $id = $data['ID_CONVOCATORIA'];
        $facultades = $data['relacion_fc'];
    
        if ($facultades != null) {
            foreach ($facultades as $facultad) {
                $id_facultad = $facultad['facultad']['ID_FACULTAD'];
                $carreras = $facultad['facultad']['carrera'];
    
                if($carreras != null){
                    foreach ($carreras as $carrera) {
                        $id_carrera = $carrera['ID_CARRERA'];
                        $this->createJurado($id, $id_carrera, $id_facultad, 0, [], 'Docente', $data['cantidad'], null, $data['participantes']);
                    }
                }
            }
        }
        $this->index();
    }
    
    /**
     * Genera aleatoriamente los jurados para cada mesa de cada carrera desiganda
     * 
     * @param int $int obtiene los ids de los usuarios para integrarlos como jurados
     * @return \Illuminate\Http\Response
     */
    private function createJurado($id_convo, $id_car, $id_fac, $int, $array, $cargo, $maxJurados, $bit, $cant_part){
        if($int < $maxJurados){
            $ids = Usuario::where('HABILITADO', 'SI')->whereHas(
                'cargo', function($query) use($cargo){
                    $query->where('NOMBRE_CARGO', $cargo);
                })->whereHas(
                    'relacion_uc.carrera', function($query) use($id_car){
                        $query->where('ID_CARRERA', $id_car);
                    }
                )->pluck('ID_USUARIO')->toArray();

            if (count($ids) < $maxJurados) {
                return $this->createJurado($id_convo, $id_car, $id_fac, $int, $array, $cargo, $maxJurados-1, $bit, $cant_part);
            }

            $id = $ids[random_int(0, count($ids)-1)];
            $existingJurados = collect($array);

            if($this->buscador_id($id, $existingJurados) != true) {
                return $this->createJurado($id_convo, $id_car, $id_fac, $int, $array, $cargo, $maxJurados, $bit, $cant_part);
            }
            $jurado = new Jurado([
                'ID_USUARIO' => $id,
                'CARGO' => ($cargo == 'Docente') ? 'VOCAL TITULAR':'VOCAL SUPLENTE'
            ]);
            array_push($array, $jurado);
            $array_new = [];
            if($maxJurados > 0 && count($array) == $maxJurados){
                $i = 0;
                $alfabeto = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $tam = intval(strlen($alfabeto)/$maxJurados)+1;
                if($maxJurados == 2){
                    $tam = intval(strlen($alfabeto)/$maxJurados);
                }
                $rango = str_split($alfabeto, $tam);
                foreach($array as $item){
                    $ini = $rango[$i][0];
                    $fin = $rango[$i][strlen($rango[$i])-1];
                    $mesa = null;
                    if($bit == null){
                        $mesa = Mesa::create([
                            'ID_CONVOCATORIA' => $id_convo,
                            'ID_CARRERA' => $id_car,
                            'ID_FACULTAD' => $id_fac,
                            'RANGO_APELLIDOS'=>"$ini-$fin"
                        ]);
                        $array_new[] = $mesa->ID_MESA;
                        $mesa->save();
                    }
                    $item->ID_MESA = ($bit == null) ? $mesa->ID_MESA:$bit[$i];
                    $item->save();
                    $i = $i+1;
                }
                if($bit == null){
                    $this->createJurado($id_convo, $id_car, $id_fac, 0, [], 'Estudiante', $maxJurados, $array_new, $cant_part);
                }
            }
            return $this->createJurado($id_convo, $id_car, $id_fac, $int+1, $array, $cargo, $maxJurados, $bit, $cant_part);
        } else {
            return $maxJurados;
        }
    }

    private function buscador_id($id, $array){
        $ids_comite = Miembros_Comite::pluck('ID_USUARIO')->all();
        $ids_jurados = Jurado::pluck('ID_USUARIO')->all();
        $ids_candidatos = Candidato::pluck('ID_USUARIO')->all();

        if ($array->contains('ID_USUARIO', $id) ||
            collect($ids_comite)->contains('ID_USUARIO', $id) || 
            collect($ids_jurados)->contains('ID_USUARIO', $id) || 
            collect($ids_candidatos)->contains('ID_USUARIO', $id)) {
            return false;
        }else{
            return true;
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
        $usuario = Jurado::find($id);
        $cargo = "";
        if($usuario['CARGO'] == "VOCAL TITULAR"){
            $cargo = "Docente";
        }else{
            $cargo = "Estudiante";
        }
        $ids = Usuario::where('HABILITADO', 'SI')->whereHas(
            'cargo', function($query) use($cargo){
                $query->where('NOMBRE_CARGO', $cargo);
            })->pluck('ID_USUARIO')->toArray();

        $id_new = $ids[random_int(0, count($ids)-1)];
        
        if($this->buscador_id($id_new, []) != true){
            return $this->update($request, $id);
        }

        $usuario->update([
            'ID_USUARIO' => $id_new,
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

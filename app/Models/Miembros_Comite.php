<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miembros_Comite extends Model
{
    use HasFactory;
    protected $table = "miembro_comite";
    protected $primaryKey = "ID_MIEMBRO";
    public $timestamps = false;
    public $increment = true;
    protected $fillable = ["ID_MIEMBRO", "ID_USUARIO", "ID_CONVOCATORIA", "ESTADO"];

    public function relacion_usuario(){
        return $this->hasOne(Usuario::class, "ID_USUARIO", "ID_USUARIO");
    }

}

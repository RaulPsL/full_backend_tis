<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuario';
    protected $primaryKey = 'ID_USUARIO';
    public $increment = false;
    protected $fillable = ['ID_USUARIO', 'NOMBRE_USUARIO', 'APELLIDO_USUARIO','CI_USUARIO', 'EDAD_USUARIO', 'FOTO_USUARIO'];

    public function cargo(){
        return $this->hasOne(Cargo::class, 'ID_USUARIO', $this->primaryKey);
    }

    public function relacion_uc(){
        return $this->hasOne(Relacion_UC::class, 'ID_USUARIO', $this->primaryKey);
    }

    public function relacion_tu(){
        return $this->hasOne(Relacion_TU::class, 'ID_USUARIO', $this->primaryKey);
    }

    public function candidato(){
        return $this->belongsTo(Candidato::class, 'ID_USUARIO', $this->primaryKey);
    }

    public function miembro_comite(){
        return $this->belongsTo(Miembros_Comite::class, 'ID_USUARIO', $this->primaryKey);
    }

    public function relacion_uj(){
        return $this->hasOne(Jurado::class, 'ID_USUARIO', $this->primaryKey);
    }
}


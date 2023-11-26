<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleccion extends Model
{
    use HasFactory;
    protected $table = 'eleccion';
    protected $primaryKey = 'ID_ELECCION';
    public $timestamps = false;
    public $increment = true;
    protected $fillable = ['ID_ELECCION', 'TIPO_ELECCION', 'ACTIVO'];

    public function relacion_eleccconvo(){
        return $this->hasMany(Convocatoria::class, 'ID_ELECCION', $this->primaryKey);
    }

    public function relacion_elecc_frente(){
        return $this->hasOne(Relacion_ELECC_FRENTE::class, 'ID_ELECCION', $this->primaryKey);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frente extends Model
{
    use HasFactory;
    protected $table = 'frente';
    protected $primaryKey = 'ID_FRENTE';
    public $timestamps = false;
    public $increment = true;
    protected $fillable = ['ID_FRENTE', 'ID_CONVOCATORIA', 'NOMBRE_FRENTE', 'LOGO_FRENTE', 'ACTIVO'];

    public function relacion_frente_conv(){
        return $this->belongsTo(Convocatoria::class, 'ID_CONVOCATORIA', 'ID_CONVOCATORIA');
    }

    public function relacion_candi_frente(){
        return $this->hasMany(Candidato::class, 'ID_FRENTE', $this->primaryKey);
    }

    public function relacion_elecc_frente(){
        return $this->hasMany(Relacion_ELECC_FRENTE::class, 'ID_FRENTE', $this->primaryKey);
    }
}

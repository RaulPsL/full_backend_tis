<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;
    protected $table = 'mesa';
    protected $primaryKey = 'ID_MESA';
    public $timestamps = false;
    public $increment = true;
    protected $fillable = ['ID_MESA', 'ID_CONVOCATORIA', 'ID_CARRERA', 'ID_FACULTAD', 'RANGO_APELLIDOS', 'UBICACION'];

    public function relacion_jurado(){
        return $this->hasMany(Jurado::class, 'ID_MESA', $this->primaryKey);
    }

    public function relacion_convj(){
        return $this->hasOne(Convocatoria::class, 'ID_CONVOCATORIA', 'ID_CONVOCATORIA');
    }

    public function relacion_fj(){
        return $this->hasOne(Facultad::class, 'ID_FACULTAD', 'ID_FACULTAD');
    }

    public function relacion_cj(){
        return $this->hasOne(Carrera::class, 'ID_CARRERA', 'ID_CARRERA');
    }
}

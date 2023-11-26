<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;
    protected $table = 'facultad';
    protected $id = 'ID_FACULTAD';
    public $increment = true;
    protected $fillable = ['ID_FACULTAD', 'NOMBRE_FACULTAD', 'UBICACION_FACULTAD','LOGO_FACULTAD'];

    public function carrera(){
        return $this->hasMany(Carrera::class, 'ID_FACULTAD', $this->id);
    }

    public function relacion_fc(){
        return $this->hasOne(Relacion_FC::class, 'ID_FACULTAD', $this->id);
    }
}

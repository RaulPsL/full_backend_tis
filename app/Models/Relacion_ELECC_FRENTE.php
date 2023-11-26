<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacion_ELECC_FRENTE extends Model
{
    use HasFactory;
    protected $table = 'relacion_elecc_frente';
    protected $primaryKey = 'ID_RELACION';
    public $timestamps = false;
    public $increment = true;
    protected $fillable = ['ID_RELACION', 'ID_ELECCION', 'ID_FRENTE'];

    public function eleccion(){
        return $this->hasOne(Eleccion::class, 'ID_ELECCION', 'ID_ELECCION');
    }

    public function frente(){
        return $this->belongsTo(Frente::class, 'ID_FRENTE', 'ID_FRENTE');
    }
}

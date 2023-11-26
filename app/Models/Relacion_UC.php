<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacion_UC extends Model
{
    use HasFactory;
    protected $table = 'relacion_uc';
    protected $id = 'ID_RELACION';
    public $increment = true;
    protected $fillable = ['ID_RELACION', 'ID_USUARIO', 'ID_CARRERA'];

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'ID_USUARIO', 'ID_USUARIO');
    }

    public function carrera(){
        return $this->belongsTo(Carrera::class, 'ID_CARRERA', 'ID_CARRERA');
    }
}

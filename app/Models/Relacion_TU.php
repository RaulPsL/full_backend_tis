<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Relacion_TU extends Model
{
    use HasFactory;

    protected $table = 'relacion_tu';
    protected $id = 'ID_RELACION';
    protected $fillable = ['ID_RELACION', 'ID_TELEFONO', 'ID_USUARIO'];

    public function Telefono(){
        return $this->belongsTo(Telefono::class, 'ID_TELEFONO', 'ID_TELEFONO');
    }

    public function Usuario(){
        return $this->belongsTo(Usuario::class, 'ID_USUARIO', 'ID_USUARIO');
    }
}

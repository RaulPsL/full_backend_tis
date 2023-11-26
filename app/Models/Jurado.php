<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurado extends Model
{
    use HasFactory;
    protected $table = 'jurado';
    protected $primaryKey = 'ID_JURADO';
    public $timestamps = false;
    public $increment = true;
    protected $fillable = ['ID_JURADO', 'ID_USUARIO', 'ID_MESA', 'CARGO'];

    public function relacion_uj(){
        return $this->belongsTo(Usuario::class, 'ID_USUARIO', 'ID_USUARIO');
    }

    public function relacion_mesa(){
        return $this->belongsTo(Mesa::class, 'ID_MESA', 'ID_MESA');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;
    protected $table = 'candidato';
    protected $primaryKey = 'ID_CANDIDATO';
    public $timestamps = false;
    public $increment = true;
    protected $fillable = ['ID_CANDIDATO', 'ID_USUARIO', 'ID_FRENTE', 'CARGO'];

    public function frente(){
        return $this->hasOne(Frente::class, 'ID_FRENTE', 'ID_FRENTE');
    }

    public function usuario(){
        return $this->hasOne(Usuario::class, 'ID_USUARIO', 'ID_USUARIO');
    }
    
    public function cargo()
    {
    return $this->belongsTo(Cargo::class, 'ID_CARGO', 'ID_CARGO');
    }
}

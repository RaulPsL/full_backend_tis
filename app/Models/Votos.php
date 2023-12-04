<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votos extends Model
{
    use HasFactory;

    protected $table = 'resultados';
    protected $primaryKey = 'idResultados';
    public $timestamps = false;
    protected $fillable = ['id_mesa', 'id_conv', 'id_frente', 'votos'];

    public function convocatoria()
    {
        return $this->hasOne(Convocatoria::class, 'ID_CONVOCATORIA', 'id_conv');
    }

    public function frente()
    {
        return $this->hasOne(Frente::class,  'ID_FRENTE','id_frente');
    }


}
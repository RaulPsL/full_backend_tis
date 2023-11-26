<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacion_MC extends Model
{
    use HasFactory;
    protected $table = 'relacion_mc';
    protected $primaryKey = 'ID_RELACION';
    public $timestamps = false;
    public $increment = true;
    protected $fillable = ['ID_RELACION', 'ID_MIEMBRO', 'ID_CONVOCATORIA'];

    public function relacion_miconv(){
        
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacion_FC extends Model
{
    use HasFactory;

    protected $table = 'relacion_fc';
    protected $primaryKey = 'ID_RELACION';
    public $timestamps = false;
    public $increment = true;

    protected $fillable = ['ID_RELACION', 'ID_FACULTAD', 'ID_CONVOCATORIA'];

    public function facultad(){
        return $this->belongsTo(Facultad::class, 'ID_FACULTAD', 'ID_FACULTAD');
    }

    public function convocatoria(){
        return $this->belongsTo(Convocatoria::class, 'ID_CONVOCATORIA', 'ID_CONVOCATORIA');
    }
}



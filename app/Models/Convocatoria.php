<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    use HasFactory;
    protected $table = 'convocatoria';
    protected $primaryKey = 'ID_CONVOCATORIA';
    public $timestamps = false;
    public $increment = true;
    
    protected $fillable = ['ID_CONVOCATORIA', 'ID_ELECCION', 'FECHA_INI', 'FECHA_FIN', 'DIA_ELECCION', 'NOMBRE_CONVOCATORIA', 'ACTIVO', 'URL_PDF_CONVOCATORIA'];

    public function relacion_fc(){
        return $this->hasOne(Relacion_FC::class, 'ID_CONVOCATORIA', $this->primaryKey);
    }

}

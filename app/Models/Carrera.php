<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    protected $table = 'carrera';
    protected $id = 'ID_CARRERA';
    public $increment = TRUE;
    protected $fillable = ['ID_CARRERA', 'ID_FACULTAD', 'NOMBRE_CARRERA','LOGO_CARRERA'];

    public function facultad(){
        return $this->belongsTo(Facultad::class, 'ID_FACULTAD', 'ID_FACULTAD');
    }
}

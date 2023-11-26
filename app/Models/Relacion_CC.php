<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacion_CC extends Model
{
    use HasFactory;
    protected $table = "relacion_carr_elecc";
    protected $primaryKey = "ID_RELACION";
    public $timestamps = false;
    public $increment = true;
    protected $fillable = ['ID_REALCION', 'ID_CARRERA', 'ID_ELECCION'];
    
}

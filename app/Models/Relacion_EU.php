<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacion_EU extends Model
{
    use HasFactory;
    protected $table = 'relacion_eu';
    protected $id = 'ID_RELACION';
    public $increment = true;
    protected $fillable = ['ID_RELACION', 'ID_EMAIL', 'ID_USUARIO'];
}

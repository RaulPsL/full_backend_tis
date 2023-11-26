<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;
    protected $table = 'telefono';
    protected $id = 'ID_TELEFONO';
    public $increment = true;
    protected $fillable = ['ID_TELEFONO', 'NUM_TELEFONO'];

    public function relacion_tu(){
        return $this->hasOne(Relacion_TU::class, 'ID_TELEFONO', $this->id);
    }
}

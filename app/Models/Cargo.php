<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargo';
    protected $id = 'ID_CARGO';
    
    public function usuario(){
        return $this->belongsTo(Usuario::class, 'ID_USUARIO', 'ID_USUARIO');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $table = 'email';
    protected $id = 'ID_EMAIL';
    public $increment = true;
    protected $fillable = ['ID_EMAIL', 'DIRECCION_EMAIL'];
}

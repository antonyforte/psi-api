<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ir extends Model
{
    use HasFactory;

    protected $table = 'ir';


    protected $fillable = ['session_id', 'individualmente', 'outrasPessoas', 'socialmente', 'resultadoGlobal'];

}

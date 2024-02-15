<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ir extends Model
{
    use HasFactory;

    protected $table = 'ir';


    protected $fillable = ['session_id', 'individualmente', 'outrasPessoas', 'socialmente', 'resultadoGlobal'];

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id')->onDelete('cascade');
    }

}

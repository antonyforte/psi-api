<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Is extends Model
{
    use HasFactory;

    protected $table = 'is';

    protected $fillable = ['session_id', 'relacaoTerapeuta', 'metasTemas', 'metodoForma', 'sessaoGlobal'];

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id')->onDelete('cascade');
    }


}

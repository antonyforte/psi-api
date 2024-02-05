<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;


    public function sessions() {
        return $this->hasMany('App\Models\Session');
    }
}
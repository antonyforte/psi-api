<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $table = 'session';


    public function pacient() {
        return $this->belongsTo('App\Models\Pacient', 'pacient_id');
    }

    public function therapist() {
        return $this->belongsTo('App\Models\Therapist');
    }
}



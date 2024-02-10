<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;

    protected $fillable = ['therapist_id'];


    public function therapists() {
        return $this->belongsTo('App\Models\Session');
    }

    public function sessions() {
        return $this->hasMany('App\Models\Session');
    }
}
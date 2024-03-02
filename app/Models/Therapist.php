<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    use HasFactory;

    protected $table = 'therapist';

    protected $fillable = ['usuario'];

    public function pacient() {
        return $this->hasMany('App\Models\Pacient')->onDelete('cascade');
    }
    public function sessions() {
        return $this->hasMany('App\Models\Session')->onDelete('cascade');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}

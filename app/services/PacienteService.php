<?php
namespace App\Services;

use App\Models\Pacient;

class PacienteService
{
    public function getAllPacientes()
    {
        return Pacient::all();
    }
}

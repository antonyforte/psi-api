<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ir;

class IrController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'session_id' => 'required|integer',
            'individualmente' => 'required|integer|min:0|max:99',
            'outrasPessoas' => 'required|integer|min:0|max:99',
            'socialmente' => 'required|integer|min:0|max:99',
            'resultadoGlobal' => 'required|integer|min:0|max:99',
        ]);

        $ir = Ir::where('session_id', $validatedData['session_id'])->first();

        if ($ir) {
            $ir->update([
                'individualmente' => max(1,ceil($validatedData['individualmente'] / 25)),
                'outrasPessoas' => max(1,ceil($validatedData['outrasPessoas'] / 25)),
                'socialmente' => max(1,ceil($validatedData['socialmente'] / 25)),
                'resultadoGlobal' => max(1,ceil($validatedData['resultadoGlobal'] / 25)),
            ]);
            

            return view('success');
        }


        return redirect()->back()->with('error', 'Erro ao atualizar dados do Ir.');
    }
}

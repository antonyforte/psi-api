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
            'individualmente' => 'required|integer|min:0|max:100',
            'outrasPessoas' => 'required|integer|min:0|max:100',
            'socialmente' => 'required|integer|min:0|max:100',
            'resultadoGlobal' => 'required|integer|min:0|max:100',
        ]);

        $ir = Ir::where('session_id', $validatedData['session_id'])->first();

        if ($ir) {
            $ir->update([
                'individualmente' => ceil($validatedData['individualmente'] / 25),
                'outrasPessoas' => ceil($validatedData['outrasPessoas'] / 25),
                'socialmente' => ceil($validatedData['socialmente'] / 25),
                'resultadoGlobal' => ceil($validatedData['resultadoGlobal'] / 25),
            ]);
            

            return view('success');
        }


        return redirect()->back()->with('error', 'Erro ao atualizar dados do Ir.');
    }
}

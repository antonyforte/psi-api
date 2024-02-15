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
                'individualmente' => ($validatedData['individualmente'] % 25 == 0 || $validatedData['individualmente'] == 0) ? intval($validatedData['individualmente'] / 25) + 1 : intval($validatedData['individualmente'] / 25) + 1,
                'outrasPessoas' => ($validatedData['outrasPessoas'] % 25 == 0 || $validatedData['outrasPessoas'] == 0) ? intval($validatedData['outrasPessoas'] / 25) + 1 : intval($validatedData['outrasPessoas'] / 25) + 1,
                'socialmente' => ($validatedData['socialmente'] % 25 == 0 || $validatedData['socialmente'] == 0) ? intval($validatedData['socialmente'] / 25) + 1 : intval($validatedData['socialmente'] / 25) + 1,
                'resultadoGlobal' => ($validatedData['resultadoGlobal'] % 25 == 0 || $validatedData['resultadoGlobal'] == 0) ? intval($validatedData['resultadoGlobal'] / 25) + 1 : intval($validatedData['resultadoGlobal'] / 25) + 1,
            ]);
            

            return view('success');
        }


        return redirect()->back()->with('error', 'Erro ao atualizar dados do Ir.');
    }
}

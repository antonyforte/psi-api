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
                'individualmente' => ($validatedData['individualmente'] % 20 == 0 || $validatedData['individualmente'] == 0) ? intval($validatedData['individualmente'] / 20) + 1 : intval($validatedData['individualmente'] / 20) + 1,
                'outrasPessoas' => ($validatedData['outrasPessoas'] % 20 == 0 || $validatedData['outrasPessoas'] == 0) ? intval($validatedData['outrasPessoas'] / 20) + 1 : intval($validatedData['outrasPessoas'] / 20) + 1,
                'socialmente' => ($validatedData['socialmente'] % 20 == 0 || $validatedData['socialmente'] == 0) ? intval($validatedData['socialmente'] / 20) + 1 : intval($validatedData['socialmente'] / 20) + 1,
                'resultadoGlobal' => ($validatedData['resultadoGlobal'] % 20 == 0 || $validatedData['resultadoGlobal'] == 0) ? intval($validatedData['resultadoGlobal'] / 20) + 1 : intval($validatedData['resultadoGlobal'] / 20) + 1,
            ]);
            

            return redirect()->back()->with('success', 'Dados do Ir foram atualizados com sucesso.');
        }


        return redirect()->back()->with('error', 'Erro ao atualizar dados do Ir.');
    }
}

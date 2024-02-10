<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Is;

class IsController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'session_id' => 'required|integer',
            'relacaoTerapeuta' => 'required|integer|min:0|max:100',
            'metasTemas' => 'required|integer|min:0|max:100',
            'metodoForma' => 'required|integer|min:0|max:100',
            'sessaoGlobal' => 'required|integer|min:0|max:100',
        ]);
        

        $is = Is::where('session_id', $validatedData['session_id'])->first();

        if ($is) {
            $is->update([
                'relacaoTerapeuta' => ($validatedData['relacaoTerapeuta'] % 25 == 0 || $validatedData['relacaoTerapeuta'] == 0) ? intval($validatedData['relacaoTerapeuta'] / 25) + 1 : intval($validatedData['relacaoTerapeuta'] / 25) + 1,
                'metasTemas' => ($validatedData['metasTemas'] % 25 == 0 || $validatedData['metasTemas'] == 0) ? intval($validatedData['metasTemas'] / 25) + 1 : intval($validatedData['metasTemas'] / 25) + 1,
                'metodoForma' => ($validatedData['metodoForma'] % 25 == 0 || $validatedData['metodoForma'] == 0) ? intval($validatedData['metodoForma'] / 25) + 1 : intval($validatedData['metodoForma'] / 25) + 1,
                'sessaoGlobal' => ($validatedData['sessaoGlobal'] % 25 == 0 || $validatedData['sessaoGlobal'] == 0) ? intval($validatedData['sessaoGlobal'] / 25) + 1 : intval($validatedData['sessaoGlobal'] / 25) + 1,
            ]);
            

            return redirect('success');
        }


        return redirect()->back()->with('error', 'Erro ao atualizar dados do Is.');
    }
}

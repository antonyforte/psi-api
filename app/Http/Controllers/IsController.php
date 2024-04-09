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
                'relacaoTerapeuta' => ceil($validatedData['relacaoTerapeuta'] / 25),
                'metasTemas' => ceil($validatedData['metasTemas'] / 25),
                'metodoForma' => ceil($validatedData['metodoForma'] / 25),
                'sessaoGlobal' => ceil($validatedData['sessaoGlobal'] / 25),
            ]);
            

            return view('success');
        }


        return redirect()->back()->with('error', 'Erro ao atualizar dados do Is.');
    }
}

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
            'relacaoTerapeuta' => 'required|integer|min:0|max:99',
            'metasTemas' => 'required|integer|min:0|max:99',
            'metodoForma' => 'required|integer|min:0|max:99',
            'sessaoGlobal' => 'required|integer|min:0|max:99',
        ]);
        

        $is = Is::where('session_id', $validatedData['session_id'])->first();

        if ($is) {
            $is->update([
                'relacaoTerapeuta' => max(1,ceil($validatedData['relacaoTerapeuta'] / 25)),
                'metasTemas' => max(1,ceil($validatedData['metasTemas'] / 25)),
                'metodoForma' => max(1,ceil($validatedData['metodoForma'] / 25)),
                'sessaoGlobal' => max(1,ceil($validatedData['sessaoGlobal'] / 25)),
            ]);
            

            return view('success');
        }


        return redirect()->back()->with('error', 'Erro ao atualizar dados do Is.');
    }
}

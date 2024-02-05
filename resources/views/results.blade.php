@extends('layouts.form')

@section('content')
    <div class="container">
        <h1 class="my-4">
            Resultados da Sessão 
            <span class="destaque" style="font-size: 16px; vertical-align: middle;">
                <span style="background-color: #ffeeba; padding: 2px 4px; border-radius: 4px;">1</span>-Muito Ruim 
                <span style="background-color: #ffeeba; padding: 2px 4px; border-radius: 4px;">2</span>-Ruim
                <span style="background-color: #ffeeba; padding: 2px 4px; border-radius: 4px;">3</span>-Medio 
                <span style="background-color: #ffeeba; padding: 2px 4px; border-radius: 4px;">4</span>-Mom 
                <span style="background-color: #ffeeba; padding: 2px 4px; border-radius: 4px;">5</span>-Muito Bom
            </span>
        </h1>

        @foreach ($relatorios as $relatorio)
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">Sessão {{ $relatorio['sessao_id'] }} em {{ $relatorio['data'] }}</h2>

                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-primary">Resultados:</h3>
                            @if ($relatorio['ir'])
                                <p class="mb-1"><strong>Individualmente:</strong> <span class="destaquer">{{ $relatorio['ir']->individualmente }}</span></p>
                                <p class="mb-1"><strong>Outras Pessoas:</strong> <span class="destaquer">{{ $relatorio['ir']->outrasPessoas }}</span></p>
                                <p class="mb-1"><strong>Socialmente:</strong> <span class="destaquer">{{ $relatorio['ir']->socialmente }}</span></p>
                                <p class="mb-1"><strong>Resultado Global:</strong> <span class="destaquer">{{ $relatorio['ir']->resultadoGlobal }}</span></p>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <h3 class="text-primary">Sessão:</h3>
                            @if ($relatorio['is'])
                                <p class="mb-1"><strong>Relação Terapeuta:</strong> <span class="destaquer">{{ $relatorio['is']->relacaoTerapeuta }}</span></p>
                                <p class="mb-1"><strong>Metas e Temas:</strong> <span class="destaquer">{{ $relatorio['is']->metasTemas }}</span></p>
                                <p class="mb-1"><strong>Método e Forma:</strong> <span class="destaquer">{{ $relatorio['is']->metodoForma }}</span></p>
                                <p class="mb-1"><strong>Sessão Global:</strong> <span class="destaquer">{{ $relatorio['is']->sessaoGlobal }}</span></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <style>
        .destaque {
            font-size: 16px;
            vertical-align: middle;
            padding-left: 200px;
        }
        .destaquer {
            display: inline-block;
            padding: 1px;
            background-color: #ffeeba;
            border-radius: 4px;
            margin-right: 5px;
            transition: transform 0.3s ease-in-out;
        }
    </style>
@endsection

@extends('layouts.form')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center titulo">
            <p>Inventário de Sessão</p> 
        </h1>
        <div class="d-flex justify-content-between">
            @php
                $dataMaisAntiga = min(array_column($relatorios, 'data'));
            @endphp
            
            @if ($dataMaisAntiga)
                <h3 class="text-start">Data de Início: <span class="destaqueII">{{ $dataMaisAntiga }}</span></h3>
            @endif
            
            <h3 class="text-end text">Cliente: <span class="destaqueII">{{$relatorios[0]['paciente']}}</span></h3>
        </div>

        <h4 class="text-center destaque">Relação com o Terapeuta</h4>
        <div class="result-section">
            <div class="result-details"> 
                @foreach ($relatorios as $relatorio)
                    <div class="individual-result">
                        <span class="result-span bg-cinza">{{$relatorio['is']->relacaoTerapeuta}}</span>
                    </div>
                @endforeach
            </div>
        </div>
        <h4 class="text-center destaque">Metas e Temas</h4>
        <div class="result-section">
            <div class="result-details"> 
                @foreach ($relatorios as $relatorio)
                    <div class="other-people-result">
                        <span class="result-span bg-cinza">{{$relatorio['is']->metasTemas}}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <h4 class="text-center destaque">Metodo e Forma</h4>
        <div class="result-section">
            <div class="result-details"> 
                @foreach ($relatorios as $relatorio)
                    <div class="social-result">
                        <span class="result-span bg-cinza">{{$relatorio['is']->metodoForma}}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <h4 class="text-center destaque">Global</h4>
        <div class="result-section">
            <div class="result-details"> 
                @foreach ($relatorios as $relatorio)
                    <div class="global-result">
                        <span class="result-span bg-cinza">{{$relatorio['is']->sessaoGlobal}}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <style>
        body {
            color: #000000;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%; /* Garante que o corpo da página ocupa 100% da altura da viewport */

        }

        .container {
            background-color: #e9e8e8;
            width: 100%;
            padding: 0px 20px 20px 20px; /* Adiciona algum espaçamento interno ao container */
            border-radius: 8px;
        }

        h1 p{
            color: #110f0f;
            font-family: 'Times New Roman', Times, serif;
            font-size: 48px;
            border-bottom: 2px solid #0053ac;
        }

        h3 {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .destaque {
            font-size: 28px;
            vertical-align: middle;
            color: #110f0f;
            margin-top: 20px;
            margin-bottom: 20px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
        }
        .destaqueII {
            color: #0053ac
        }
        .titulo {
            font: 900;
            padding: 20px;
        }

        .badge {
            padding: 2px 8px;
            border-radius: 4px;
            margin-right: 5px;
        }

        .result-section {
            margin-top: 20px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 15px;
            background-color: #ffffff;
        }

        .result-details {
            display: flex;
            flex-wrap: wrap;
        }

        .individual-result,
        .other-people-result,
        .social-result,
        .global-result {
            margin-right: 10px;
            margin-bottom: 15px;
        }

        .result-span {
            display: block;
            padding: 2px 10px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
        }

        .text-center {
            text-align: center;
        }

        h4 {
            margin-bottom: 20px;
            margin-top: 20px;
        }

        /* Cores personalizadas */
        .bg-branco {
            background-color: #ffffff;
            color: #000000;
        }

        .bg-cinza {
            background-color: #525151;
            color: #ffffff;
        }

        .bg-preto {
            background-color: #000000;
            color: #ffffff;
        }

        .bg-azul {
            background-color: #0053ac;
            color: #ffffff;
        }
        .d-flex {
            margin-bottom: 120px;
            
        }
    </style>
@endsection

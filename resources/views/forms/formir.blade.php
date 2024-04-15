@extends('layouts.form')

<style>
    body {
        margin-bottom: 20px;
    }

    .text-form {
        flex: 1;
        padding: 20px;
    }

    .text-form p {
        align-self: center;
        
        padding: 70px;
        font-size: 16px;
        font: italic;
        color: #30312f;
    }

    .flex-container {
        display: flex;
    }

    .col-span-1 {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .align-end p {
        align-self: flex-end;
        padding: 30px 140px 0 0;
    }

    p {
        padding: 30px 0 0 0;
    }

    .custom-range-container {
        padding-left: 60px;
        padding-right: 60px;
        text-align: center;
        margin-bottom: 20px; 
    }

    .custom-range-text {
        padding: 40px 0;
        font: bold;
        font-family: 'Courier New', Courier, monospace;
    }

    .custom-range-input {
        width: 938px;
        height: 39px;
        margin: 0 20px;
    }

    .custom-range-thumb {
        width: 56px;
        height: 57px;
    }

    .custom-btn {
        text-align: right; 
        margin-top: 40px; 
        padding-right: 40px;
        padding-bottom: 20px;
    }

    .btn {
        margin-top: 120px;
        width: 100px; 
    }
</style>
<form action="{{ route('salvar-dados-ir') }}" method="POST">
    @csrf
    <input type="hidden" name="session_id" value="{{ $ir->session_id }}">
    <div class="row-span-3">
        <div class="row-span-3">
            <div class="row-span-2 flex-container">
                <div class="col-span-1">
                    <p>Paciente: {{$pacient}}</p>
                </div>
                <div class="col-span-1 align-end">
                    <p>Data: {{$data}}</p>
                </div>
            </div>
            <div>
                <p>Terapeuta: {{$therapist}}</p>
            </div>
            <div class="text-form">
                <p>Considerando a semana passada, incluindo hoje, ajude-nos a entender como se sentiu nas áreas de vida incluídas neste inventário. Marcas mais à esquerda representam níveis mais baixos ou negativos e quanto mais à direita representam níveis mais altos ou positivos. Por favor, marque como desejar.
                </p>
            </div>
        </div>
        <div class="row-span-4">
            <!-- Slider 1 -->
            <div class="custom-range-container">
                <div class="custom-range-text">
                    <h3>Individualmente:</h3>
                    <h4>(Bem-estar pessoal)</h4>
                </div>
                <label for="customRange1" class="form-label"></label>
                <input type="range" name="individualmente" class="custom-range-input form-range" id="customRange1" min="0" max="99" step="3">
            </div>

            <!-- Slider 2 -->
            <div class="custom-range-container">
                <div class="custom-range-text">
                    <h3>Com outras pessoas:</h3>
                    <h4>(Família, relações próximas)</h4>
                </div>
                <label for="customRange2" class="form-label"></label>
                <input type="range" name="outrasPessoas" class="custom-range-input form-range" id="customRange2" min="0" max="99" step="3">
            </div>

            <!-- Slider 3 -->
            <div class="custom-range-container">
                <div class="custom-range-text">
                    <h3>Socialmente:</h3>
                    <h4>(Trabalho, Escola, Amizades)</h4>
                </div>
                <label for="customRange3" class="form-label"></label>
                <input type="range" name="socialmente" class="custom-range-input form-range" id="customRange3" min="0" max="99" step="3">
            </div>

            <!-- Slider 4 -->
            <div class="custom-range-container">
                <div class="custom-range-text">
                    <h3>Global (em geral):</h3>
                    <h4>(Sentimento geral de bem-estar)</h4>
                </div>
                <label for="customRange4" class="form-label"></label>
                <input type="range" name="resultadoGlobal" class="custom-range-input form-range" id="customRange4" min="0" max="99" step="3">
            </div>
        </div>
        <div class="custom-btn">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </div>
</form>
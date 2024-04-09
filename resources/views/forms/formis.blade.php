@extends('layouts.form')

<style>
    .text-form {
        flex: 1;
        padding: 20px;
        padding-left: 16s0px;
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

    .custom-range-text {
        flex: 1;
        text-align: right;
        padding-right: 10px; 
    }

    .slider-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;
    }

    .slider-text {
        text-align: center;
        margin-bottom: 10px;
        font-family: 'Courier New', Courier, monospace

    }

    .custom-range-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
        width: 100%;

    }

    .custom-range-text-left {
        flex: 1;
        text-align: left;
        padding-left: 40px;
        padding-right: 20px;
    }

    .custom-range-text-right {
        flex: 1;
        text-align: right;
        padding-right: 40px;
        padding-left: 20px;
    }

    .custom-range-input {
        width: 100%; 
        height: 39px;
        margin: 0 20px;
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
<form action="{{ route('salvar-dados-is') }}" method="POST">
    @csrf
    <input type="hidden" name="session_id" value="{{ $is->session_id }}">

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
                <p>Por favor, indique como foi a sessão de hoje, marcando de modo que mais se aproxime da experiência que teve nesta sessão.
                </p>
            </div>
        </div>
        <div class="row-span-5">
            <!-- Slider 1 -->
            <div class="slider-container">
                <div class="slider-text">
                    <h3>Relação com o/a terapeuta:</h3>
                </div>
                <div class="custom-range-container">
                    <div class="custom-range-text-left">
                        <p>Senti que o/a terapeuta não me ouviu, não me entendeu e/ou não me respeitou.</p>
                    </div>
                    <label for="customRange1" class="form-label"></label>
                    <input type="range" name="relacaoTerapeuta" class="custom-range-input form-range" id="customRange1" min="0" max="99" step="5">
                    <div class="custom-range-text-right">
                        <p>Senti que o/a terapeuta me ouviu, me entendeu e/ou me respeitou.</p>
                    </div>
                </div>
            </div>

            <!-- Slider 2 -->
            <div class="slider-container">
                <div class="slider-text">
                    <h3>Metas e Temas:</h3>
                </div>
                <div class="custom-range-container">
                    <div class="custom-range-text-left">
                        <p>Não trabalhamos nem falamos do que eu queria trabalhar e falar.</p>
                    </div>
                    <label for="customRange2" class="form-label"></label>
                    <input type="range" name="metasTemas" class="custom-range-input form-range" id="customRange2" min="0" max="99" step="5">
                    <div class="custom-range-text-right">
                        <p>Trabalhamos e falamos do que eu queria trabalhar e falar.</p>
                    </div>
                </div>
            </div>

            <!-- Slider 3 -->
            <div class="slider-container">
                <div class="slider-text">
                    <h3>Método ou forma:</h3>
                </div>
                <div class="custom-range-container">
                    <div class="custom-range-text-left">
                        <p>Não me dei bem com a forma que o/a terapeuta usou para organizar a sessão.</p>
                    </div>
                    <label for="customRange3" class="form-label"></label>
                    <input type="range" name="metodoForma" class="custom-range-input form-range" id="customRange3" min="0" max="99" step="5">
                    <div class="custom-range-text-right">
                        <p>Senti-me bem com a forma do/a terapeuta organizar a sessão</p>
                    </div>
                </div>
            </div>

            <!-- Slider 4 -->
            <div class="slider-container">
                <div class="slider-text">
                    <h3>Global (em geral):</h3>
                </div>
                <div class="custom-range-container">
                    <div class="custom-range-text-left">
                        <p>Sinto que ficou faltando alguma coisa na sessão de hoje.</p>
                    </div>
                    <label for="customRange4" class="form-label"></label>
                    <input type="range" name="sessaoGlobal" class="custom-range-input form-range" id="customRange4" min="0" max="99" step="5">
                    <div class="custom-range-text-right">
                        <p>De maneira geral, a sessão de hoje foi boa para mim.</p>
                    </div>
                </div>
            </div>


        </div>
        <div class="custom-btn">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </div>
</form>
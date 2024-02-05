@extends('layouts.form')

<style>

    body {
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    flex-direction: column;
    }

    .row-span-2 {
        flex: 1;
        padding: 20 60 0 40;
        display: block;
    }

    h1 {
        font: bold;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .text-imput {
        margin-top: 160px;
        width: 50%;
    }


    .form-control {
        margin-top: 20px;
    }


    .btn-send{
        margin-top: auto;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        text-align: end;
        height: 400px;
        
    }

    .btn {
        margin-top: 50px;
    }
    .selected-paciente {
        font-size: 14px;
        margin-bottom: 20px;
        margin-left: 40px;

    }

    .id-badge {
        display: inline-block;
        padding: 5px 10px;
        background-color: #19048f;
        color: #b3b3b3;
        border-radius: 5px;
    }
</style>

<div class="row-span-3">
    <div>
        <h1>Nova Sessão</h1>
    </div>
    <form action="/dashboard/s" method="POST">
        @csrf
        <div class="text-imput">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome completo do Paciente</label>
                <div class="d-flex">
                    <select class="form-select" id="exampleFormControlInput1" name="paciente_id" onchange="updateSelectedPaciente(this)">
                        <option selected disabled>Selecione o paciente</option>
                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                        @endforeach
                    </select>
                    <div class="selected-paciente">
                        ID do Paciente: <span class="id-badge" id="selectedPacienteId"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputDate">Data da Sessão:</label>
                <input type="datetime-local" class="form-control" id="date" name="date">
            </div>
        </div>
        <div class="btn-send">
            <input type="submit" class="btn btn-success" value="Salvar">
        </div>
    </form>
</div>

<script>
    function updateSelectedPaciente(selectElement) {
        // Obtem o ID selecionado e atualiza o campo
        var selectedPacienteId = selectElement.value;
        document.getElementById('selectedPacienteId').innerText = selectedPacienteId;
    }
</script>
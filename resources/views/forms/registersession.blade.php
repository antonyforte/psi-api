@extends('layouts.form')

<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 50px;
    }

    .card {
        border: 1px solid #ced4da;
        border-radius: 10px;
    }

    .card-header {
        background-color: #28a745;
        color: white;
        border-bottom: 0;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 20px;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .selected-paciente {
        margin-top: 10px;
    }

    .id-badge {
        font-weight: bold;
        color: #28a745;
    }

    .selected-paciente {
        margin-left: 40px;
    }

    .bt-foot {
        margin-top: 40px;
        width: 100%;
        text-align: center;
        display: flexbox;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="mb-0">Nova Sessão</h1>
                </div>
                <div class="card-body">
                    <form action="/dashboard/sessoes/register" method="POST" id="sessionForm">
                        @csrf
                        <div id="sessionFields">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Paciente</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $nome }}" readonly disabled>

                                    <input type="hidden" name="paciente_id[]" value="{{ $xtid }}">

                                    <div class="selected-paciente">
                                        ID do Paciente: <span class="id-badge" id="selectedPacienteId">{{ $xtid }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputDate">Data da Sessão:</label>
                                <input type="datetime-local" class="form-control" name="date[]" required>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-success" onclick="addSession()">Adicionar Sessão</button>
                            <input type="submit" class="btn btn-success" value="Salvar Todas">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bt-foot">
        <a href="/dashboard">
            <button type="button" class="btn btn-custom" disabled>< Voltar</button>
        </a>
    </div>
</div>

<script>
    function updateSelectedPaciente(selectElement) {
        // Obtem o ID selecionado e atualiza o campo
        var selectedPacienteId = selectElement.value;
        document.getElementById('selectedPacienteId').innerText = selectedPacienteId;
    }

    function setDefaultDateTime() {
        var dateInputs = document.getElementsByName('date[]');
        var now = new Date().toISOString().slice(0, 16);
        for (var i = 0; i < dateInputs.length; i++) {
            dateInputs[i].value = now;
        }
    }

    function addSession() {
        var sessionFields = document.getElementById('sessionFields');
        var newSessionField = document.createElement('div');
        newSessionField.classList.add('form-group');

        newSessionField.innerHTML = `
            <label for="exampleFormControlInput1" class="form-label">Paciente</label>
            <div class="d-flex">
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $nome }}" readonly disabled>
                <input type="hidden" name="paciente_id[]" value="{{ $xtid }}">
                <div class="selected-paciente">
                    ID do Paciente: <span class="id-badge" id="selectedPacienteId">{{ $xtid }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputDate">Data da Sessão:</label>
                <input type="datetime-local" class="form-control" name="date[]" required>
            </div>
        `;
        sessionFields.appendChild(newSessionField);
        setDefaultDateTime();
    }

    setDefaultDateTime();
</script>
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

    .selected-paciente{
        margin-left: 40px;
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
                    <form action="/dashboard/s" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="form-label">Selecionar Paciente</label>
                            <div class="d-flex">
                                <select class="form-select" id="exampleFormControlInput1" name="paciente_id" onchange="updateSelectedPaciente(this)" required>
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
                            <input type="datetime-local" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="text-end">
                            <input type="submit" class="btn btn-success" value="Salvar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateSelectedPaciente(selectElement) {
        // Obtem o ID selecionado e atualiza o campo
        var selectedPacienteId = selectElement.value;
        document.getElementById('selectedPacienteId').innerText = selectedPacienteId;
    }
</script>
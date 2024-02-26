<style>

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

    .bt-foot {
        margin-top: 40px;
        width: 100%;
        text-align: center;
        display: flexbox;
    }

</style>

@extends('layouts.form')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="mb-0">Cadastrar Paciente</h1>
                </div>
                <div class="card-body">
                    <form action="/dashboard/p" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome completo do Paciente</label>
                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Insira o nome aqui" required>
                        </div>
                        <div class="text-end">
                            <input type="submit" class="btn btn-success" value="Cadastrar">
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
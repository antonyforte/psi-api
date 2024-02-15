@extends('layouts.form')
<style>
    body {
        background-color: #f8f9fa;
        color: #343a40;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>
</head>
<body>

<div class="container">
<h1 class="my-4">Lista de Pacientes</h1>

@if (count($pacients) > 0)
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>                
                <th>Paciente</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacients as $pacient)
                <tr>
                    <td>{{ $pacient->nome ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('delete-pacient', ['pacient_id' => $pacient->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-info" role="alert">
        Nenhum paciente encontrado.
    </div>
@endif
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

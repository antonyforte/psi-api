@extends('layouts.form')

<style>
    body {
        background-color: #f8f9fa;
        padding: 20px;
    }
    .container {
        max-width: 600px;
        margin: auto;
    }
    .card {
        margin-top: 20px;
    }
    .btn-custom {
        color: blue; /* Specify your desired text color */
        background-color: transparent; /* Specify your desired background color */
        border: none; /* Remove any default border */
        outline: none; /* Remove the outline on focus */
        cursor: pointer; /* Add a pointer cursor on hover */
        text-decoration: none; /* Remove underline */
    }
    .bt-foot {
        margin-top: 240px;
        width: 100%;
        text-align: start;
        display: flexbox;
    }
</style>

</head>
<body>

<div class="container">
    <h1 class="mt-4 mb-4">Links dos Inventários</h1>

    @foreach($is as $key => $session_is)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Inventário de Resultados para Sessão {{ $key+1 }}:</h5>
            <p class="card-text"><a href="{{ route('ir.show', ['session_id' => $ir[$key]->session_id, 'token' => $token[$key]]) }}">{{ route('ir.show', ['session_id' => $ir[$key]->session_id, 'token' => $token[$key]]) }}</a></p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Inventário de Sessão para Sessão {{ $key+1 }}:</h5>
            <p class="card-text"><a href="{{ route('is.show', ['session_id' => $is[$key]->session_id, 'token' => $token[$key]]) }}">{{ route('is.show', ['session_id' => $is[$key]->session_id, 'token' => $token[$key]]) }}</a></p>
        </div>
    </div>
    @endforeach

    <div class="bt-foot">
        <a href="/dashboard"> 
            <button type="button" class="btn btn-custom" disabled> < Dashboard</button>
        </a>
    </div>
</div>

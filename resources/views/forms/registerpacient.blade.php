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

    .form-label {
        margin-bottom: 10px;
        color: blue;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 22px;
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

    .btn-primary {
        margin-top: 50px;
    }


</style>


<div class="row-span-3">
    <div>
        <h1>Novo Paciente</h1>
    </div>
    <form action="/dashboard/p" method="POST">
        @csrf
        <div class="text-imput">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome completo do Paciente</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Insira o nome aqui">
            </div>
        </div>
        <div class="btn-send">
            <input type="submit" class="btn btn-success" value="Cadastrar">
        </div>
    </form>
</div>
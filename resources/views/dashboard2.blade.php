@extends('layouts.icons')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pacientes') }}
        </h2>
    </x-slot>
    
    <style>
        .custom-delete-button {
            margin-right: 30px;
            margin-top: 10px;
            background-color: #cf0c0c;
            transition: background-color 0.3s ease;
        }

        .custom-delete-button:hover {
            background-color: #a00303;
        }

        .custom-session-button {
            background-color: rgb(2, 204, 137);
            border-color: rgb(2, 168, 113);
            transition: background-color 0.3s ease;
        }

        .custom-session-button:hover {
            background-color: rgb(3, 138, 97);
            border-color: rgb(2, 168, 113);
        }

        .modal-container {
            z-index: 9999;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            max-width: 600px;
            width: 100%;
        }

        .btn-add {
            position: absolute;
            z-index: 1000;
            border: none;
            padding: 10px 10px;
            border-radius: 100%;
            font-size: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h3 {
            margin-bottom: 10px;
            text-align: center;
            padding: 10px 40px;
            font-size: 2em;
            font-family: 'Merriweather', serif;
            color: rgba(9, 6, 179, 0.933);
            border: 20px;
            
        }

    </style>



    @if(Session::has('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-4 rounded-md shadow-md flex items-center">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <div class="ml-4">
                <p class="font-bold">{{ Session::get('success') }}</p>
            </div>
        </div>
    @endif

    @if(Session::has('alert'))
        <div class="alert alert-danger" role="alert">
            <p class="font-bold">{{ Session::get('alert') }}</p>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-b border-gray-200">
                @if(auth()->user()->name == 'admin')
                    <h2>Você está logado como admin, registre um terapeuta para poder utilizar o sistema.</h2>
                @else
                    <div id="scroll-reference" class="p-3">
                        <a href="{{ route('forms.registerpacient') }}" class="btn btn-primary btn-add"> 
                            <ion-icon name="add" class="align-middle"></ion-icon>
                        </a>
                    </div>
                    <x-welcome2 />
                    <div class="container">
                        <table class="table table-bordered">
                            <tbody>
                                @foreach($pacients as $pacient)
                                    <tr>
                                        <td style="width: 100px;">
                                            <ion-icon name="person-circle-outline" size="large"></ion-icon>
                                        </td>
                                        <td style="width: 100%; height: 108px; font-size: 18px; color: blue; font-weight: bold; padding-left: 10px;">
                                            <div class="flex justify-between align-middle">
                                                {{ $pacient->nome }}
                                                <span style="font-size: 14px; color: gray; margin-right: 740px; margin-left: 40px;  align-self: center">ID: {{ $pacient->id }}</span>
                                                <div x-cloak x-data="{ showModal: false }">
                                                    <button @click="showModal = true" class="btn btn-danger btn-sm custom-delete-button ml-2">
                                                        <ion-icon name="close" class="align-middle"></ion-icon>
                                                    </button>
                                                    <div class="modal-container" x-show="showModal">
                                                        <div class="modal-content">
                                                            <p class="text-2xl font-semibold text-indigo-500 mb-4 items-center">Atenção</p>
                                                            <p class="text-gray-800 mb-6">A ação é irreversível, você realmente deseja excluir permanentemente o paciente e todas as suas sessões ?</p>
                                                            <div class="flex justify-between"> 
                                                                <button @click="showModal = false" class="text-gray-600 hover:text-gray-800 px-6 py-2 rounded-md focus:outline-none border border-black">
                                                                    Cancelar
                                                                </button>
                                                                
                                                                <form x-if="showModal" action="{{ route('delete-pacient', ['pacient_id' => $pacient->id]) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 transition duration-300">
                                                                        Apagar
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="flex items-center py-3">
                                                <div class="flex space-x-1 justify-between w-full">
                                                    
                                                    <div class="">
                                                        <span style="font-size: 14px; color: gray; margin-right: 20px;">N de sessões: {{ $pacient->num_sessoes }}</span>
                                                        <span style="font-size: 14px; color: gray;">
                                                            @if(isset($pacient->ultima_sessao) && !empty($pacient->ultima_sessao))
                                                                Última sessão: {{ $pacient->ultima_sessao }}
                                                            @else
                                                                Última sessão: Não há sessões feitas.
                                                            @endif
                                                        </span>
                                                        <div class="d-flex gap-6">
                                                            <a href="{{ route('forms.registersession' , ['pacient_id' => $pacient->id]) }}" class="btn btn-primary custom-session-button">
                                                                <ion-icon name="add" class="align-middle"></ion-icon>
                                                            </a>
                                                            <a href="{{ route('sessions', ['pacient_id' => $pacient->id]) }}" class="btn btn-primary {{ $pacient->num_sessoes == 0 ? 'disabled' : '' }}" 
                                                                data-toggle="popover" data-placement="top" data-trigger="hover" title="Visualize as sessões" data-content="{{ $pacient->num_sessoes == 0 ? 'Paciente sem sessão' : '' }}" style="background-color: rgb(2, 204, 137); border-color: rgb(2, 173, 116); transition: background-color 0.3s ease; 
                                                                ">
                                                                <ion-icon name="eye" class="align-middle"></ion-icon> 
                                                            </a>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="width: 100%; height: 108px;">
                                            <a href="{{ route('pacientes.resultados', ['pacient_id' => $pacient->id]) }}" class="btn btn-primary mt-2 {{ $pacient->num_sessoes == 0 ? 'disabled' : '' }}" 
                                                data-toggle="popover" data-placement="top" data-trigger="hover" title="Inventário de Resultados" data-content="{{ $pacient->num_sessoes == 0 ? 'Paciente sem sessão' : '' }}">IR</a>
                                        </td>
                                        <td style="width: 100%; height: 108px;">
                                            <a href="{{ route('pacientes.resultadosII', ['pacient_id' => $pacient->id]) }}" class="btn btn-primary mt-2 {{ $pacient->num_sessoes == 0 ? 'disabled' : '' }}" 
                                                data-toggle="popover" data-placement="top" data-trigger="hover" title="Inventário de Sessões" data-content="{{ $pacient->num_sessoes == 0 ? 'Paciente sem sessão' : '' }}">IS</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>





<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pacientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome2 />
                <div class="container">
                    <table class="table table-bordered">
                        <tbody>
                            @foreach($pacients as $pacient)
                                <tr>
                                    <td style="width: 100px;">
                                        <ion-icon name="person-circle-outline" size="large"></ion-icon>                                    </td>
                                    <td style="width: 100%; height: 108px; font-size: 18px; color: blue; font-weight: bold; padding-left: 10px;">
                                        {{ $pacient->nome }}
                                        <div style="display: flex;">
                                            <span style="font-size: 14px; color: gray; margin-right: 20px; flex: 0 0 60%;">ID: {{ $pacient->id }}</span>
                                            <span style="font-size: 14px; color: gray; margin-right: 20px;">N de sessões: {{ $pacient->num_sessoes }}</span>
                                            <span style="font-size: 14px; color: gray;">Última sessão: {{ $pacient->ultima_sessao }}</span>
                                        </div>
                                    </td>
                                    <td style="width: 100%; height: 108px;">
                                        <a href="{{ route('pacientes.resultados', ['pacient_id' => $pacient->id]) }}" class="btn btn-primary">IR</a>
                                    </td>
                                    <td style="width: 100%; height: 108px;">
                                        <a href="{{ route('pacientes.resultadosII', ['pacient_id' => $pacient->id]) }}" class="btn btn-primary">IS</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

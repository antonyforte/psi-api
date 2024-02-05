

@section('content')
    <div class="container">
        <h1 class="my-4">Lista de Sessões</h1>

        @if (count($sessions) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Paciente</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sessions as $session)
                        <tr>
                            <td>{{ $session->date }}</td>
                            <td>{{ $session->patient->nome ?? 'N/A' }}</td>
                            <td>
                                <form action="{{ route('delete-session', ['session_id' => $session->id]) }}" method="POST">
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
            <p>Nenhuma sessão encontrada.</p>
        @endif
    </div>
@endsection

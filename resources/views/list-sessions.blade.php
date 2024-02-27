@extends('layouts.form')
@extends('layouts.icons')
<style>
    /* Background color with gradient */
    body {
        background: linear-gradient(to bottom right, #f2f8fc, #d4e6f1);
        color: #343a40;
        font-family: Raleway, sans-serif;
    }

    /* Container with rounded corners and shadow */
    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    /* Styled h1 with underline and padding */
    h1 {
        margin-bottom: 30px;
        text-align: center;
        text-decoration: underline 2px #07062e;
        padding: 10px 40px;
        font-size: 2em;
        font-family: 'Merriweather', serif;
    }

    /* Improved table styling */
    .table-container {
        overflow-x: auto;
        max-width: 100%;
    }
    .table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }
    .table th, .table td {
        text-align: center;
        padding: 8px;
        border: 1px solid #ddd;
    }
    .table th {
        background-color: #ececec;
    }

    /* Button with gradient and hover effect */
    .btn-danger {
        background: linear-gradient(to right, #dc3545, #c82333);
        border-color: transparent;
        color: #fff;
        padding: 10px 20px;
        font-size: 14px;
        margin: 0 5px;
        transition: all 0.3s ease-in-out;
    }
    .btn-danger:hover {
        background: linear-gradient(to right, #c82333, #9b1928);
    }

    /* Improved alert styling */
    .alert-info {
        background-color: #e8f5fe;
        border-color: #bee5eb;
        color: #007bff;
        padding: 12px;
        font-size: 14px;
        border-radius: 4px;
    }

    /* Styled link with hover effect */
    a {
        font-size: 8px;
        color: #07062e;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }
    a:hover {
        color: #343a40;
    }

    /* Improved "Voltar" button with rounded corner and icon */
    .btn-return {
        position: fixed;
        bottom: 20px;
        left: 20px;
        z-index: 1000;
        background-color: #07062e;
        border: none;
        color: #fff;
        padding: 10px 15px;
        border-radius: 4px;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .btn-return i {
        margin-right: 5px;
        font-size: 16px;
    }
</style>

</head>
<body>

    @if (session('success'))
        <div class="alert alert-success mt-5" role="alert">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger mt-5" role="alert">
            {{ session('error') }}
        </div>
    @endif

<div class="container">
    <h1 class="">LISTA DE SESSÕES</h1>
    <h3 style="color: #07062e;">Paciente: <span style="color: #0d07b8; margin-bottom: 10px; font-family: 'Times New Roman', Times, serif; font-size: 32px;">{{ $pacient->nome }}</span></h3>
    @if (count($sessions) > 0)
        <div class="table-container">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Data</th>
                        <th>Inventário de Resultados</th>
                        <th>Inventário de Sessão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sessions as $session)
                        <tr>
                            <td>{{ $session->data }}</td>
                            <td><a href="{{ route('ir.show', ['session_id' => $session->id, 'token' => $tokens[$session->id]]) }}">{{ route('ir.show', ['session_id' => $session->id, 'token' => $tokens[$session->id]]) }}</a></td>
                            <td><a href="{{ route('is.show', ['session_id' => $session->id, 'token' => $tokens[$session->id]]) }}">{{ route('is.show', ['session_id' => $session->id, 'token' => $tokens[$session->id]]) }}</a></td>
                            <td class="btn-container">
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    <ion-icon name="close" class="align-middle" ></ion-icon>
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
                                        </div>
                                        <div class="modal-body">
                                          Essa ação excluirá completamentamente esta sessão feita com o paciente nesta Data. Prosseguir com a exclusão ?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                          <form action="{{ route('delete-session', ['session_id' => $session->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Apagar</button>

                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info" role="alert">
            Nenhuma sessão encontrada.
        </div>
    @endif
    <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary btn-return">< Voltar</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

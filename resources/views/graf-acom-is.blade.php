<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Psicotech</title>
    <link href="{{ asset('/graph-table/styles.css')}}" rel="stylesheet">
</head>
<body>
    <h1 class="red">Inventário de Sessão</h1>
    <div class="pacient-container">
        <h3 class="yellow" style="font-size: 22px;">Paciente: </h3>

        <h3 class="white-blue" style="font-size: 22px; padding-left: 2%">{{$relatorios[0]['paciente']}}</h3>
    
        <h3 class="yellow" style="font-size: 22px; padding-left: 60%">Terapeuta: {{$relatorios[0]['terapeuta']}}</h3>

        <h3 class="white-blue" style="font-size: 22px; padding-left: 2%">teste</h3>

    </div> 

    
        <!--Tabela Relacao com o Terapeuta -->
        <table class="container">
            <h1 style="margin-top: 5%">Relação com o Terapeuta</h1>
            <thead>
                <tr>
                    <?php $prevYear = null; ?>
                    @foreach ($relatorios as $relatorio)
                    @if ($relatorio['ano'] != $prevYear)
                        <th>
                            <h2>{{$relatorio['ano']}}</h2>
                            <h1 class="date-index-cell" style="display: flex; margin-bottom: 10px">{{substr($relatorio['data'],5,10)}}</h1>
                        </th>
                    @else
                        <th><h1 class="date-index-cell" style="display: flex; margin-top: 75px">{{substr($relatorio['data'],5,10)}}</h1></th>
                    @endif
                    <?php $prevYear = $relatorio['ano'];?>
                    @endforeach
                </tr>
                <tr class="index-h">
                    @foreach ($relatorios as $key => $relatorio)
                        <th class="index-cell">{{ $key + 1 }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['is']->relacaoTerapeuta == 4) value-td @endif">4</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['is']->relacaoTerapeuta == 3) value-td @endif">3</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                    <td class="@if($relatorio['is']->relacaoTerapeuta == 2) value-td @endif">2</td>
                @endforeach
                </tr>
                 <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['is']->relacaoTerapeuta == 1) value-td @endif">1</td>
                    @endforeach
                </tr>
            </tbody>
        </table>

        <!--Tabela Metas e Temas -->
        <table class="container">
            <h1 style="margin-top: 10%">Metas e Temas</h1>
            <thead>
                <tr>
                    <?php $prevYear = null; ?>
                    @foreach ($relatorios as $key => $relatorio)
                    @if ($relatorio['ano'] != $prevYear)
                        <th>
                            <h2>{{$relatorio['ano']}}</h2>
                            <h1 class="date-index-cell" style="display: flex; margin-bottom: 10px">{{substr($relatorio['data'],5,10)}}</h1>
                        </th>
                    @else
                        <th><h1 class="date-index-cell" style="display: flex; margin-top: 75px">{{substr($relatorio['data'],5,10)}}</h1></th>
                    @endif
                    <?php $prevYear = $relatorio['ano'];?>

                    @endforeach
                </tr>
                <tr class="index-h">
                    @foreach ($relatorios as $key => $relatorio)
                        <th class="index-cell">{{ $key + 1 }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['is']->metasTemas == 4) value-td @endif">4</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['is']->metasTemas == 3) value-td @endif">3</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                    <td class="@if($relatorio['is']->metasTemas == 2) value-td @endif">2</td>
                @endforeach
                </tr>
                 <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['is']->metasTemas == 1) value-td @endif">1</td>
                    @endforeach
                </tr>
            </tbody>
        </table>

        <!--Tabela Metodo e Forma -->
        <table class="container">
            <h1 style="margin-top: 10%">Metodo e Forma</h1>
            <thead>
                <tr>
                    <?php $prevYear = null; ?>
                    @foreach ($relatorios as $relatorio)
                    @if ($relatorio['ano'] != $prevYear)
                        <th>
                            <h2>{{$relatorio['ano']}}</h2>
                            <h1 class="date-index-cell" style="display: flex; margin-bottom: 10px">{{substr($relatorio['data'],5,10)}}</h1>
                        </th>
                    @else
                        <th><h1 class="date-index-cell" style="display: flex; margin-top: 75px">{{substr($relatorio['data'],5,10)}}</h1></th>
                    @endif
                    <?php $prevYear = $relatorio['ano'];?>
                    @endforeach
                </tr>
                <tr class="index-h">
                    @foreach ($relatorios as $key => $relatorio)
                        <th class="index-cell">{{ $key + 1 }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['is']->metodoForma == 4) value-td @endif">4</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['is']->metodoForma == 3) value-td @endif">3</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                    <td class="@if($relatorio['is']->metodoForma == 2) value-td @endif">2</td>
                @endforeach
                </tr>
                 <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['is']->metodoForma == 1) value-td @endif">1</td>
                    @endforeach
                </tr>
            </tbody>
        </table>

        <!--Tabela global -->
        <table class="container">
            <h1 style="margin-top: 10%">Global</h1>
            <thead>
                <tr>
                    <?php $prevYear = null; ?>
                    @foreach ($relatorios as $relatorio)
                    @if ($relatorio['ano'] != $prevYear)
                        <th>
                            <h2>{{$relatorio['ano']}}</h2>
                            <h1 class="date-index-cell" style="display: flex; margin-bottom: 10px">{{substr($relatorio['data'],5,10)}}</h1>
                        </th>
                    @else
                        <th><h1 class="date-index-cell" style="display: flex; margin-top: 75px">{{substr($relatorio['data'],5,10)}}</h1></th>
                    @endif
                    <?php $prevYear = $relatorio['ano'];?>
                    @endforeach
                </tr>
                <tr class="index-h">
                    @foreach ($relatorios as $key => $relatorio)
                        <th class="index-cell">{{ $key + 1 }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['is']->sessaoGlobal == 4) value-td @endif">4</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['is']->sessaoGlobal == 3) value-td @endif">3</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                    <td class="@if($relatorio['is']->sessaoGlobal == 2) value-td @endif">2</td>
                @endforeach
                </tr>
                 <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['is']->sessaoGlobal == 1) value-td @endif">1</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
</body>
</html>
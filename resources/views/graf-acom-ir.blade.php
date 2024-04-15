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
    <h1 class="red">Inventário de Resultados</h1>
    <div class="pacient-container">
        <h3 class="yellow" style="font-size: 22px;">Paciente: </h3>

        <h3 class="white-blue" style="font-size: 22px; padding-left: 2%">{{$relatorios[0]['paciente']}}</h3>
    
        <h3 class="yellow" style="font-size: 22px; padding-left: 60%">Terapeuta: </h3>

        <h3 class="white-blue" style="font-size: 22px; padding-left: 2%">{{$relatorios[0]['terapeuta']}}</h3>

    </div> 

    
        <!--Tabela Individualmente -->
        <table class="container">
            <h1 style="margin-top: 5%">Individualmente</h1>
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
                        <td class="@if($relatorio['ir']->individualmente == 4) value-td @endif">4</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['ir']->individualmente == 3) value-td @endif">3</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                    <td class="@if($relatorio['ir']->individualmente == 2) value-td @endif">2</td>
                @endforeach
                </tr>
                 <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['ir']->individualmente == 1) value-td @endif">1</td>
                    @endforeach
                </tr>
            </tbody>
        </table>

        <!--Tabela Outras Pessoas -->
        <table class="container">
            <h1 style="margin-top: 10%">Com Outras Pessoas</h1>
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
                        <td class="@if($relatorio['ir']->outrasPessoas == 4) value-td @endif">4</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['ir']->outrasPessoas == 3) value-td @endif">3</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                    <td class="@if($relatorio['ir']->outrasPessoas == 2) value-td @endif">2</td>
                @endforeach
                </tr>
                 <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['ir']->outrasPessoas == 1) value-td @endif">1</td>
                    @endforeach
                </tr>
            </tbody>
        </table>

        <!--Tabela Socialmente -->
        <table class="container">
            <h1 style="margin-top: 10%">Socialmente</h1>
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
                        <td class="@if($relatorio['ir']->socialmente == 4) value-td @endif">4</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['ir']->socialmente == 3) value-td @endif">3</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                    <td class="@if($relatorio['ir']->socialmente == 2) value-td @endif">2</td>
                @endforeach
                </tr>
                 <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['ir']->socialmente == 1) value-td @endif">1</td>
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
                        <td class="@if($relatorio['ir']->resultadoGlobal == 4) value-td @endif">4</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['ir']->resultadoGlobal == 3) value-td @endif">3</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($relatorios as $relatorio)
                    <td class="@if($relatorio['ir']->resultadoGlobal == 2) value-td @endif">2</td>
                @endforeach
                </tr>
                 <tr>
                    @foreach ($relatorios as $relatorio)
                        <td class="@if($relatorio['ir']->resultadoGlobal == 1) value-td @endif">1</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
</body>
</html>
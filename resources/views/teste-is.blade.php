@php
    $leftPosition = 3;
@endphp

@foreach ($relatorios as $relatorio)
    @for($i = 1; $i <= 5; $i++)
        @if($relatorio['ir']->individualmente == $i)
        <div class="menu menu{{$i}}" style="left: {{$leftPosition}}%">
            <div class="circle" id="circle5"></div>
        </div>
        @else
            <div class="menu menu{{$i}}" style="left: {{$leftPosition}}%">
            </div>
        @endif
    @endfor@php
    $leftPosition = 3;
@endphp

@foreach ($relatorios as $relatorio)
    @for($i = 1; $i <= 5; $i++)
        @if($relatorio['ir']->individualmente == $i)
        <div class="menu menu{{$i}}" style="left: {{$leftPosition}}%">
            <div class="circle" id="circle5"></div>
        </div>
        @else
            <div class="menu menu{{$i}}" style="left: {{$leftPosition}}%">
            </div>
        @endif
    @endfor
    @php
        $leftPosition += 5;
    @endphp
@endforeach
    @php
        $leftPosition += 5;
    @endphp
@endforeach
<!-- Inclua os arquivos CSS e JS aqui -->
<link rel="stylesheet" href="{{ asset('circle-assets/css/main.css') }}">
<script src="{{ asset('circle-assets/js/main.js') }}"></script>

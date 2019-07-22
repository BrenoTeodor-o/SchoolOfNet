<h1>TESTE</h1>

{{-- DIRETIVAS --}}
@if($value > 100)
    <p>valor maior que 100</p>
@else
    <p>valor menor que 100</p>
@endif

@for ($i = 0; $i < $value; $i++)
    {{$i+1}}
@endfor

<br>

@php
    $i=0;
@endphp

@while ($i < $value)
    {{$i+1}}
    @php
        $i++;
    @endphp
@endwhile

<br>

@foreach ($myArray as $key => $value)
    <p>{{$loop->index}} - {{$key}} - {{$value}}</p>
@endforeach

<br>

@forelse ([] as $key => $value)
    <p>{{$loop->index}} - {{$key}} - {{$value}}</p>
@empty
    <p>Nenhum registro encontrado</p>
@endforelse


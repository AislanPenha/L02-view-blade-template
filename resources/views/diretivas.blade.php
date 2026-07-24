<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Diretivas Blade</title>
</head>
<body>
    <h1>Diretivas Blade</h1>
    <p>Value: {{ $value }}</p>

    {{-- IF ELSEIF ELSE ENDIF --}}
    <h3>instrução IF ELSEIF ELSE ENDIF</h3>
    @if($value < 10)
        <p>Primeiro</p>
        @elseif($value < 10)
            <p>Segundo</p>
        @elseif($value < 50)
            <p>Terceiro</p>
        @elseif($value == 100)
            <p>Quarto</p>
        @else
            <p>Outro caso(if)</p>
    @endif

    {{-- switch --}}
    <h3>instrução switch</h3>
    @switch($value)
        @case(100)
            <p>Valor 100</p>
            @break
        @case(200)
            <p>Valor 200</p>
            @break
        @case(300)
            <p>Valor 300</p>
            @break
        @default
            <p>Outro valor (switch)</p>
    @endswitch

    {{-- empty --}}
    <h3>Diretiva empty</h3>
    @empty($valor)
        <p>Não existe/não tem valor na variável $valor, tem $value</p>
        @else
            <p>Existe a variável $value</p>
    @endempty
    
    {{-- isset --}}
    <h3>Diretiva isset</h3>
    @isset($value)
        <p>Existe $value, mesmo se o valor for vazio.</p>
        @else
            <p>Não existe a variável $value</p>
    @endisset

    {{-- unless --}}
    <h3>Diretiva unless <=> if not</h3>
    @unless($value)
        <p>Não existe a variável $value</p>
        @else
        <p>Existe $value, mesmo se o valor for vazio.</p>
    @endunless

    {{-- for --}}
    <h3>Laço for</h3>
    @for($index = 0; $index < 5; $index++)
        <span>{{ $index }} </span>
    @endfor

    {{-- foreach --}}
    <h3>Laço foreach</h3>
    @foreach($cities as $city)
        <span>{{ $city }}, </span>
    @endforeach

    {{-- forelse --}}
    <h3>Laço forelse</h3>
    @forelse($letters as $letter)
        <span>{{ $letter }}, </span>
        @empty
            <p>letter está vazio. </p>
    @endforelse

    {{-- while e php --}}
    <h3>Laço while e PHP</h3>
    @php
        $indice = 0;
        $tag_span = '<span class="text-warnig">' . $indice . '</span>'; 
    @endphp
    {{-- Não funcion a tag --}}
    {{ $tag_span }}

    {{-- Funciona tag --}}
    <h3>{!! $tag_span !!}</h3>
    @while($indice < 10)
        <p>Indice: {{ $indice }} </p>
        @php
            $indice++
        @endphp
    @endwhile

    {{-- continue e break --}}
    <h3>Continue, Break e loop variable</h3>
    @for($index = 0; $index < 10; $index++)

        {{-- continue --}}
        @if($index == 5)
            @continue
        @endif

        {{-- break --}}
        @if($index == 7)
            <i>para com break 7</i>
            @break
        @endif
        <span>{{ $index }} </span>
    @endfor

    {{-- loop variable --}}
    <h4>Loop variable</h4>
    @foreach($cities as $city)
        @if($loop->first)
            <i>Primeiro índice</i>
        @endif
        <p>[{{ $loop->index }}] - {{ $city }} </p>
        @if($loop->last)
            <i>Último índice</i>
        @endif
    @endforeach
</body>
</html>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Feriados</title>
    </head>
    <body>
        <h1>Consulta de Feriados</h1>

        <form method="POST" action="{{ route('feriados.consultar') }}">
            @csrf

            <input type="text" name="ano" required>

            <button type="submit">Consultar Feriados</button>
        </form>

        <!-- Mostrar os dados, caso haja -->

        @isset($feriados)
            @foreach ($feriados as $feriado)
                <p>Data: <b>{{$feriado['date']}}</b></p>
                <p>Feriado: <b>{{$feriado['name']}}</b></p>
                <p>Tipo: <b>{{$feriado['type']}}</b></p>
                <hr>
            @endforeach
        @endisset

    </body>
</html>
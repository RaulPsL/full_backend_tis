<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boleta Electoral</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            overflow-x: auto;
        }
        .header {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td {
            border: 2px solid #ccc;
            vertical-align: top;
            padding: 10px;
            width: 33.33%;
            height: 300px;
            box-sizing: border-box;
            position: relative; /* Agrega esta línea para posicionar elementos relativos */
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        th.frente1 {
            background-color: #FFD700;
            font-weight: bold;
        }
        th.frente2 {
            background-color: #90EE90;
            font-weight: bold;
        }
        th.frente3 {
            background-color: #00BFFF;
            font-weight: bold;
        }
        th.frente4 {
            background-color: #FC9100;
            font-weight: bold;
        }
        th.frente5 {
            background-color: #BD92EE;
            font-weight: bold;
        }
        th.frente6 {
            background-color: #DC848F;
            font-weight: bold;
        }
        .candidate-item {
            margin-bottom: 5px;
        }
        .checkbox-section {
            text-align: center;
            margin-top: 10px;
        }
        .checkbox-section input {
            width: 30px;
            height: 30px;
            position: absolute;
            top: 100px; /* Ajusta el valor según tu preferencia (agregué unidades de píxeles) */
            left: 100px; /* Ajusta el valor según tu preferencia (agregué unidades de píxeles) */
            opacity: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        Boleta Electoral 2023
    </div>
    
    @php
        $chunkedFrentes = $frentes->chunk(3);
    @endphp

    @foreach ($chunkedFrentes as $chunk)
        <table>
            <tr>
                @foreach ($chunk as $index => $frente)
                    <th class="frente{{ $index + 1 }}">{{ $frente->NOMBRE_FRENTE }}</th>
                @endforeach
            </tr>
            <tr>
                @foreach ($chunk as $frente)
                    <td class="frente{{ $loop->index + 1 }}">
                        @foreach ($frente->candidatos as $candidato)
                            <div class="candidate-item">
                                <label>
                                    <input type="radio" name="{{ $frente->NOMBRE_FRENTE }}" value="{{ $candidato->ID_CANDIDATO }}">
                                    <strong>{{ $candidato->CARGO }}</strong><br>
                                    {{ $candidato->usuario?->NOMBRE_USUARIO }} {{ $candidato->usuario?->APELLIDO_USUARIO }} <br>
                                    {{ $candidato->cargo?->NOMBRE_CARGO }}
                                </label>
                            </div>
                        @endforeach
                        <div class="checkbox-section" style="text-align: center;">
                            <label style="display: inline-block; position: relative; width: 30px; height: 30px; background-color: #ffffff; border: 2px solid #000000;">
                                <input type="checkbox" name="casilla_marcar" style="width: 100%; height: 100%; position: absolute; top: 100px; left: 100px; opacity: 0;">
                            </label>
                        </div>
                    </td>
                @endforeach
            </tr>
        </table>
    @endforeach
</body>
</html>

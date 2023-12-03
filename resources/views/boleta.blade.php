<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Boleta Electoral</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            overflow-x: auto; /* Permite el desplazamiento horizontal si los elementos no caben */
        }
        .header {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        Boleta Elecciones 2023.
    </div>
    <table>
        <tr>
            @foreach ($frentes as $frente)
            <th>
                {{ @$frente->NOMBRE_FRENTE }}
            </th>
            @endforeach
        </tr>
        <tr>
            @foreach ($frentes as $frente)
            <td>
                @foreach ($frente->candidatos as $candidato)
                <div class="candidate-item">
                    <label>
                    <input type="radio" name="president" value="candidate1"> {{$candidato->CARGO}}
                    </label>
                </div>
                @endforeach
            </td>
            @endforeach
        </tr>
    </table>
</body>
</html>
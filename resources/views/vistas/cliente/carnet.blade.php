<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 22px;
            color: #4b4b4b;
            text-align: center;
        }

        .card {
            width: 100%;
            padding: 10px;
            border: 2px solid rgb(208, 208, 208);
            box-sizing: border-box;
        }

        .card-text {
            float: left;
            /* Flotar el texto a la izquierda */
            width: 150px;
            /* Ajustar el ancho del texto */
        }

        .card-image {
            float: right;
            /* Flotar la imagen a la derecha */
            width: 140px;
            height: 140px;
            background-color: #ccc;
        }

        .card::after {
            content: "";
            display: table;
            clear: both;
            /* Limpiar floats */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            width: 50%;
            padding: 10px;
            vertical-align: top;
        }

        img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <h1>CARNET DE CLIENTES</h1>
    <table>
        @foreach ($datosCliente as $index => $cliente)
            @if ($index % 2 == 0)
                <tr>
            @endif
            <td>
                <div class="card">
                    <div class="card-text">
                        <p><b>Cliente:</b> {{ $cliente->nombre }}</p>
                        <p><b>DNI:</b> {{ $cliente->dni }}</p>
                    </div>
                    <div class="card-image">
                        <img src="{{ asset("foto/qr/$cliente->id_cliente.png") }}" alt="{{ asset("foto/qr/$cliente->id_cliente.png") }}">
                    </div>
                </div>
            </td>
            @if ($index % 2 == 1)
                </tr>
            @endif
        @endforeach
        @if (count($datosCliente) % 2 != 0)
            </tr>
        @endif
    </table>
</body>

</html>

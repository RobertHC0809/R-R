<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>


    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #0070a1;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>

@php
        $id = Auth::user()->ID_Usuario;
        $pedidos = DB::select('select * from pedidos where id_users = ? and estado = "pendiente"', [$id]);

        $total = 0; // Inicializa el total en 0
    @endphp

<body>
    <h1>Lista de Pedidos</h1>
    <table>
        <tr>
            <th>Fecha del Pedido</th>
            <th>Estado</th>
        </tr>
        @foreach ($pedidos as $pedido)
        <tr>
            <td>{{ $pedido->fecha_pedido }}</td>
            <td>{{ $pedido->estado }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Carrito de Compras</title>
    @include("Electromecanica/Home/header");
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        li:last-child {
            border-bottom: none;
        }

        p {
            text-align: right;
            margin-top: 20px;
            font-size: 24px;
            color: #E94E77;
            font-weight: bold;
        }
    </style>
</head>
<body>
    @php
        $id = Auth::user()->ID_Usuario;
        $detalle = DB::select('select * from vista_carrito_productos where ID_Usuario = ?', [$id]);
        $total = 0; // Inicializa el total en 0
    @endphp
    <div class="container">
        <h1>Carrito de Compras</h1>
        <ul>
            @foreach($detalle as $item)
                @php
                    // Sumar el precio del producto multiplicado por la cantidad al total
                    $total += $item->Precio * $item->Cantidad_Carrito;
                @endphp
                <li>{{ $item->Nombre_Producto }} - ${{ $item->Precio }} x {{ $item->Cantidad_Carrito }}         <img class="product-photo" src="{{ asset('storage/producto/' . $item ->imagen) }}" alt="Imagen producto"></li>
            @endforeach
        </ul>
        <p>Total: ${{ number_format($total, 2) }}</p>
    </div>
</body>
</html>

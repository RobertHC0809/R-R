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
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .delete-btn {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }

        .product-photo {
            width: 50px;
            height: 50px;
            object-fit: cover;
            margin-right: 10px;
        }

        .pay-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }

        .pay-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    @php
        $id = Auth::user()->ID_Usuario;
        $detalle = DB::select('select * from vista_carrito_productos where ID_Usuario = ? and estado_carrito = "Procesado"', [$id]);

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
                <li>
                    <div>
                        <img class="product-photo" src="{{ asset('storage/producto/' . $item->imagen) }}" alt="Imagen producto">
                        {{ $item->Nombre_Producto }} - ${{ $item->Precio }} x {{ $item->Cantidad_Carrito }}
                    </div>
                    <form action="{{ route('borrar_cart', ['id_carrito' => $item->ID_Carrito]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Seguro/a que quieres borrar el producto registrado?');" class="delete-btn" type="submit">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <p>Total: ${{ number_format($total, 2) }}</p>
        
        <a href="{{ route('reg_factura') }}" class="pay-btn">Ir a Pagar</a>
    </div>
</body>
</html>

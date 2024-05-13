<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <ul>
        @foreach($products as $product)
            <li>
                {{ $product->name }} - {{ $product->price }}
                <a href="{{ route('agregar_carrito', ['id' => $product->id]) }}">Agregar al Carrito</a>
            </li>
        @endforeach
    </ul>
</body>
</html>

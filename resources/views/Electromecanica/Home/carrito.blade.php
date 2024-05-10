<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <ul>
        @foreach($cart as $item)
            <li>{{ $item->name }} - {{ $item->price }}</li>
        @endforeach
    </ul>
    <p>Total: ${{ $total }}</p>
</body>
</html>

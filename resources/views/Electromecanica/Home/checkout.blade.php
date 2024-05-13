<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
</head>
<body>
    <h1>Procesar Pago</h1>
    <!-- Formulario de pago -->
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <!-- Campos para la información de pago -->
        <label for="card_number">Número de Tarjeta:</label>
        <input type="text" id="card_number" name="card_number">
        <br>
        <label for="expiration_date">Fecha de Expiración:</label>
        <input type="text" id="expiration_date" name="expiration_date">
        <br>
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv">
        <br>
        <!-- Botón de enviar -->
        <button type="submit">Pagar</button>
    </form>
</body>
</html>

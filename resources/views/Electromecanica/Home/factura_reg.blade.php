<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Pago PayPal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        .formulario h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .form-group label {
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-group input[type="submit"] {
            background-color: #003087;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
            padding: 10px 20px;
        }

        .form-group input[type="submit"]:hover {
            background-color: #002070;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #003087;
            box-shadow: 0 0 5px rgba(0, 48, 135, 0.5);
        }

        .total {
            text-align: center;
            font-size: 1.2em;
            color: #003087;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .paypal-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .paypal-button button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #003087;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: background-color 0.3s;
        }

        .paypal-button button:hover {
            background-color: #002070;
        }

        .paypal-icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            width: 30px;
            height: 100%;
            background-image: url('paypal-icon.png');
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="formulario" action="procesar_pago_paypal.php" method="POST">
            <h2>Formulario de Pago PayPal</h2>
            <div class="form-group">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion">
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad">
            </div>
            <div class="form-group">
                <label for="codigo_postal">Código Postal:</label>
                <input type="text" id="codigo_postal" name="codigo_postal">
            </div>
            <div class="form-group">
                <label for="pais">País:</label>
                <select id="pais" name="pais" required>
                    <option value="">Seleccionar país</option>
                    <option value="US">Estados Unidos</option>
                    <option value="CA">Canadá</option>
                    <option value="MX">México</option>
                    <!-- Agrega más opciones según tus necesidades -->
                </select>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción del Pago:</label>
                <textarea id="descripcion" name="descripcion" rows="4"></textarea>
            </div>
            @php
            $id = Auth::user()->ID_Usuario;
            $detalle = DB::select('select * from vista_carrito_productos where ID_Usuario = ? and estado_carrito = "Procesado"', [$id]);
            $total = 0; // Inicializa el total en 0
            @endphp

            @foreach($detalle as $item)
            @php
                $total += $item->Precio * $item->Cantidad_Carrito;
            @endphp
            @endforeach
            <div class="total">Total a Pagar: ${{ number_format($total, 2) }}</div>
        </form>

        <div class="paypal-button">
            <form action="{{route('payment.payWithPayPal')}}" method="POST">
                @csrf
                <input type="hidden" name="amount" value="{{ $total }}">
                <button type="submit">
                    <span class="paypal-icon"></span>
                    Pay With PayPal
                </button>
            </form>
        </div>
    </div>
</body>
</html>
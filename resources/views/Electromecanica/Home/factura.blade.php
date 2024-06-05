<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Factura - Electromecanica RYR</title>
  <link rel="stylesheet" href="{{ asset('css/style_fact.css') }}">
  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
</head>
@php
$id = Auth::user()->ID_Usuario;
$facturas = DB::select('SELECT f.id_factura, f.itbs, f.descuento, f.monto_total, f.total, f.ID_Usuario,
                        u.name AS usuario, 
                        m.Nombre AS metodo_pago,
                        b.nombre AS banco
                        FROM factura f
                        JOIN users u ON f.ID_Usuario = u.id
                        JOIN metodos_de_pago m ON f.ID_Metodo = m.ID_Metodo
                        JOIN banco b ON f.id_banco = b.id_banco
                        WHERE f.ID_Usuario = ?', [$id]);
@endphp
<body>
<!-- Contenido HTML -->
<div id="app">
    <h2>Factura Electromecanica RYR</h2>
    <div class="row my-3">
      <div class="col-10">
        <h1>Factura de Pedido y Reserva</h1>
        <p>El mejor lugar para ordenar tus piezas y solicitar servicios</p>
        <p>Esta factura es para realizar una transferencia de banco</p>
        <p>Cuando se realice la transferencia confirmaremos su pago</p>
      </div>
      <div class="col-2">
        <img src="{{ asset('img/android-chrome-192x192.png') }}" height="200" width="200" />
      </div>
    </div>
  
    <hr />
    @foreach ($facturas as $factura)
    <div class="row fact-info mt-3">
      <div class="col-3">
        <h5>Facturar a</h5>
        <p>{{ $factura->usuario }}</p>
      </div>
      <div class="col-3">
        <h5>Información del pedido</h5>
        <p>@Electromecanica_RYR</p>
        <p>Correo: info@electromecanicaryr.com</p>
      </div>
      <div class="col-3">
        <h5>N° Factura: {{ $factura->id_factura }}</h5>
        <h5>Fecha: {{ date("d/m/Y") }}</h5>
        <h5>Id cliente: {{ $factura->ID_Usuario }}</h5>
      </div>
    </div>
  
    <div class="row my-5">
      <table class="table table-borderless factura">
        <thead>
          <tr>
            <th>N°</th>
            <th>Descripción</th>
            <th>Tiempo</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>
            </td>
            <td><!-- Campo de tiempo, si existe --></td>
            <td>{{ $factura->total }}</td>
          </tr>
          <!-- Añadir más filas según sea necesario -->
        </tbody>
        <tfoot>
          <tr>
            <th></th>
            <th></th>
            <th>Subtotal</th>
            <th>${{ $factura->monto_total }}</th>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th>ITBIS</th>
            <th>${{ number_format($factura->itbs, 2) }}</th>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th>Total Factura</th>
            <th>${{ number_format($factura->total, 2) }}</th>
          </tr>
        </tfoot>
      </table>
    </div>
  
    <div class="cond row">
      <div class="col-12 mt-3">
        <h4>Condiciones y formas de pago</h4>
        <p>El pago se debe realizar en un plazo de 15 días.</p>
        <p>Método de pago: {{ $factura->metodo_pago }}</p>
        <p>Banco: {{ $factura->banco }}</p>
      </div>
    </div>
    @endforeach
</div>
</body>
</html>

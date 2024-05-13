<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos R&R</title>
  <link rel="icon" href="{{ asset('imagenes/ryr.png') }}" type="image">
  <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
</head>
<body>
  <header>
    <div class="logo">
      <img src="{{ asset('imagenes/RYRPROD.png') }}" alt="Website Logo">
    </div>
  </header>

  <a href="{{ route('Inicio') }}" class="button">Volver a inicio</a>

  <div class="container">

  @php
   $products = DB::select("select * from productos");
   @endphp

    @foreach($products as $product)
    <div class="product">
      <img class="img-fluid" width="100px" height="100px" src="{{ asset('storage/producto/' . $product->imagen) }}" alt="Imagen producto">
      <h2 class="product-Nombre">{{ $product->Nombre }}</h2>
      <p class="product-Precio">${{ $product->Precio }}</p>
      <button class="add-to-cart-button" onclick="addToCart('{{ addslashes($product->Nombre) }}', '{{ $product->Precio }}')">Agregar al carrito</button>
    </div>
    @endforeach
  </div>

  <div id="cart">
    <h2>Carrito de compras</h2>
    <ul id="cart-items">
      <!-- Los ítems añadidos al carrito se mostrarán aquí -->
    </ul>
    <p id="total-price">Total: $0.00</p>
  </div>

  <!-- Incluye el archivo JavaScript -->
  <script src="{{ asset('js/carrito.js') }}"></script>
</body>
</html>

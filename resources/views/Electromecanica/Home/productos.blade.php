<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>Productos R&R</title>
  <link rel="icon" href="{{ asset('imagenes/ryr.png') }}" type="image">
  <link rel="stylesheet" href="{{ asset('css/productos.css') }}">

  @include("Electromecanica/Home/header")
  <style>
    /* Estilos generales */
    body {
      font-family: 'Open Sans', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f2f5;
      color: #333;
    }

    /* Estilo del encabezado */
    header {
      text-align: center;
      padding: 20px 0;
      background-color: #4A90E2;
      color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .logo img {
      max-width: 200px;
    }

    /* Estilo del contenedor de productos */
    .container {
      display: flex;
      flex-wrap: wrap; /* Permite que los productos se envuelvan en filas nuevas */
      justify-content: center;
      padding: 20px;
      gap: 20px;
    }

    /* Estilo de los productos */
    .product {
      width: 220px; /* Ajusta el ancho de cada producto */
      text-align: center;
      background-color: #fff;
      padding: 20px;
      margin: 10px;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .product:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    .product-photo {
      width: 100%; /* Ajusta el tamaño de la foto al tamaño del producto */
      height: auto;
      margin-bottom: 20px;
      border-radius: 8px;
    }

    .product-name {
      font-size: 22px;
      margin-bottom: 10px;
      color: #333;
    }

    .product-price {
      font-size: 20px;
      color: #E94E77;
    }

    /* Estilo del botón */
    .button {
        position: fixed;
        top: 20px;
        left: 20px;
        display: inline-block;
        padding: 10px 20px;
        background-color: #4A90E2;
        color: #fff;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .button:hover {
        background-color: #357ABD;
    }

    /* Estilo para el contenedor del carrito */
    #cart {
      margin-top: 20px;
      background-color: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
      width: 90%; /* Ajusta automáticamente al ancho del contenedor */
      max-width: 400px; /* Limita el ancho máximo para mantenerlo manejable */
      margin: 20px auto; /* Centra el carrito horizontalmente */
    }

    /* Título del carrito */
    #cart h2 {
      margin-top: 0;
      font-size: 20px; /* Tamaño de fuente más pequeño para dispositivos móviles */
      margin-bottom: 10px;
      color: #333;
    }

    /* Lista de ítems en el carrito */
    #cart-items {
      list-style-type: none;
      padding: 0;
    }

    /* Estilo de ítem individual en el carrito */
    #cart-items .cart-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 0;
      border-bottom: 1px solid #ccc;
      margin-bottom: 5px;
      color: #555;
    }

    /* Estilo de los botones de eliminar */
    #cart-items .cart-item button {
      background-color: #E94E77;
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      font-size: 14px; /* Tamaño de fuente más pequeño */
    }

    /* Estilo de hover para los botones de eliminar */
    #cart-items .cart-item button:hover {
      background-color: darkred;
    }

    /* Estilo para los botones de agregar al carrito */
    .add-to-cart-button {
      background-color: #4A90E2; /* Azul moderno */
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 8px; /* Borde curvado */
      cursor: pointer;
      transition: background-color 0.3s, transform 0.3s; /* Efecto de animación en hover */
      font-size: 16px;
      font-weight: bold;
    }

    .add-to-cart-button:hover {
      background-color: #357ABD; /* Cambia el color en hover */
      transform: translateY(-5px);
    }

    /* Estilo para el total del precio */
    #total-price {
      font-size: 18px; /* Tamaño de fuente más pequeño */
      font-weight: bold;
      margin-top: 10px;
      color: #333;
    }

    /* Media query para ajustes en dispositivos móviles */
    @media (max-width: 480px) {
      #cart {
        padding: 10px; /* Reduce el padding para ahorrar espacio */
      }
      
      #cart h2 {
        font-size: 18px; /* Reduce el tamaño de fuente */
      }
      
      #total-price {
        font-size: 16px; /* Reduce el tamaño de fuente */
      }
      
      .product {
        width: 45%; /* Ajusta el ancho para dispositivos móviles */
      }
    }
  </style>
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
      $id = Auth::user()->ID_Usuario;
      $products = DB::select("select * from productos");
    @endphp

    @foreach($products as $product)
    <div class="product">
      <form action="{{ route('registrar_carrito') }}" method="GET" class="box">
        @csrf
        <img class="product-photo" src="{{ asset('storage/producto/' . $product->imagen) }}" alt="Imagen producto">
        <h2 class="product-name">{{ $product->Nombre }}</h2>
        <p class="product-price">${{ $product->Precio }}</p>
        <input type="number" name="Cantidad" min="1" class="qty" required>
        <input type="hidden" name="ID_Producto" value="{{ $product->ID_Producto }}">
        <input type="hidden" name="Nombre" value="{{ $product->Nombre }}">
        <input type="hidden" name="ID_Usuario" value="{{ $id }}">
        <button type="submit" class="agregar">Agregar</button>
      </form>
    </div>
    @endforeach
  </div>

  @php
  $products = DB::select("select * from carrito_de_compras");
  @endphp

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

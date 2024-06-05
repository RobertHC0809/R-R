<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos R&R</title>
  <link rel="icon" href="{{ asset('imagenes/ryr.png') }}" type="image">
  @include("Electromecanica/Home/header")
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('imagenes/icono.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<style>
/* Estilos generales */
body {
    font-family: 'Montserrat', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f7fa;
    color: #333;
}

/* Estilo del encabezado */
header {
    text-align: center;
    padding: 20px 0;
    background-color: #ffffff00;
    color: #fff;
}

header .logo img {
    max-width: 200px;
}

/* Estilo del contenedor de productos */
.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
    gap: 20px;
}

/* Estilo de los productos */
.product {
    width: calc(25% - 40px); /* Ajuste para cuatro productos por fila */
    text-align: center;
    background-color: #fff;
    padding: 20px;
    margin: 10px;
    border-radius: 16px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.product:hover {
    transform: translateY(-10px);
    box-shadow: 0 16px 32px rgba(0, 0, 0, 0.2);
}

.product-photo {
    width: 100%;
    height: auto;
    margin-bottom: 20px;
    border-radius: 8px;
}

.product-name {
    font-size: 22px;
    margin-bottom: 10px;
    color: #333;
    font-weight: 500;
}

.product-price {
    font-size: 20px;
    color: #4e7de9;
    font-weight: 700;
}

.qty {
    width: 80px;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    text-align: center;
}

/* Estilo del botón "Agregar" */
.agregar {
    background-color: #4a90e2;
    color: #fff;
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
    font-size: 16px;
    font-weight: bold;
}

.agregar:hover {
    background-color: #357abd;
    transform: translateY(-5px);
}

/* Estilo para el contenedor del carrito */
#cart {
    margin-top: 20px;
    background-color: #fff;
    padding: 20px;
    border-radius: 16px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 400px;
    margin: 20px auto;
}

#cart h2 {
    margin-top: 0;
    font-size: 22px;
    margin-bottom: 10px;
    color: #333;
    font-weight: 500;
}

#cart-items {
    list-style-type: none;
    padding: 0;
}

#cart-items .cart-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #ccc;
    margin-bottom: 5px;
    color: #555;
}

#cart-items .cart-item button {
    background-color: #e94e77;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s;
    font-size: 14px;
}

#cart-items .cart-item button:hover {
    background-color: darkred;
}

/* Estilos para el botón de volver a inicio */
.button {
    position: fixed;
    top: 20px;
    left: 20px;
    display: inline-block;
    padding: 12px 24px;
    background-color: #4a90e2;
    color: #fff;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
}

.button:hover {
    background-color: #357abd;
}

/* Estilo para el formulario de búsqueda */
.search-form {
    margin-bottom: 20px;
    text-align: center;
}

.search-input {
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 8px;
    width: 60%;
    max-width: 400px;
    font-size: 16px;
    margin-right: 10px;
}

.search-button {
    padding: 12px 24px;
    background-color: #4a90e2;
    color: #fff;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

.search-button:hover {
    background-color: #357abd;
}

@media (max-width: 1200px) {
    .product {
        width: calc(33.333% - 40px); /* Tres productos por fila en pantallas medianas */
    }
}

@media (max-width: 768px) {
    .product {
        width: calc(50% - 40px); /* Dos productos por fila en pantallas pequeñas */
    }
}

@media (max-width: 480px) {
    #cart {
        padding: 10px;
    }
    
    #cart h2 {
        font-size: 18px;
    }
    
    .product {
        width: 90%; /* Un producto por fila en pantallas muy pequeñas */
    }
    
    .search-input {
        width: 100%;
        margin-right: 0;
        margin-bottom: 10px;
    }
}

</style>

</head>
<body>
  <!-- Encabezado -->


  <!-- Contenedor de productos -->
  <div class="container">
    @php
      $products = DB::select("select * from productos");
    @endphp

    @foreach($products as $product)
    <div class="product">
      <form action="{{ route('registrar_carrito') }}" method="GET" class="box">
        @csrf
        <img class="product-photo" src="{{ asset('storage/producto/' . $product->imagen) }}" alt="Imagen producto">
        <h2 class="product-name">{{ $product->Nombre }}</h2>
        <p class="product-price">${{ $product->Precio }}</p>
        <p class="product-name">En Stock: {{ $product->Cantidad }}</p>
        <input type="number" name="Cantidad" min="1" class="qty" required>
        <input type="hidden" name="ID_Producto" value="{{ $product->ID_Producto }}">
        <input type="hidden" name="Nombre" value="{{ $product->Nombre }}">
        <button type="submit" class="agregar">Agregar</button>
      </form>
    </div>
    @endforeach
  </div>

  <!-- Incluye el archivo JavaScript -->
  <script src="{{ asset('js/carrito.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos R&R</title>
  <link rel="icon" href="imagenes/ryr.png" type="image">
  <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
</head>
<body>
  <header>
    <div class="logo">
      <img src="imagenes/RYRPROD.png" alt="Website Logo">
    </div>
  </header>

<a href="{{ route('Inicio') }}" class="button">Volver a inicio</a>

  <div class="container">
    <div class="product" id ="product1">
      <img src="imagenes/producto1.png" class="product-photo"></a>
      <h2 class="product-name">Válvulas Solenoides</h2>
      <p class="product-price">$750</p>
      <select class="product-size" id="product1-size" onchange="updatePrice('product1')">
        <option value="Pequeño">Pequeño</option>
        <option value="Mediano">Mediano</option>
        <option value="Grande">Grande</option>
      </select>
      <button class="add-to-cart-button" onclick="addToCart('Producto 1', 750, document.getElementById('product1-size').value)">Agregar al carrito</button>
    </div>

    <div class="product">
        <img src="imagenes/producto2.png" alt="Producto 2" class="product-photo"></a>
      <h2 class="product-name">Producto 2</h2>
      <p class="product-price">$500</p>
      <button class="add-to-cart-button" onclick="addToCart('Producto 2', 500)">Agregar al carrito</button>
    </div>    

    <div class="product">
        <img src="imagenes/producto3.png" alt="Producto 3" class="product-photo"></a>
        <h2 class="product-name">Producto 3</h2>
        <p class="product-price">$990</p>
        <button class="add-to-cart-button" onclick="addToCart('Producto 3', 500)">Agregar al carrito</button>
      </div>

      <div class="product">
        <img src="imagenes/producto4.png" alt="Producto 4" class="product-photo"></a>
        <h2 class="product-name">Producto 4</h2>
        <p class="product-price">$550</p>
        <button class="add-to-cart-button" onclick="addToCart('Producto 4', 500)">Agregar al carrito</button>

      </div>

      <div class="product">
        <img src="imagenes/producto5.png" alt="Producto 5" class="product-photo"></a>
        <h2 class="product-name">Producto 5</h2>
        <p class="product-price">$1,100</p>
        <button class="add-to-cart-button" onclick="addToCart('Producto 5', 500)">Agregar al carrito</button>

      </div>

      <div class="product">
        <img src="imagenes/producto6.png" alt="Producto 5" class="product-photo"></a>
        <h2 class="product-name">Producto 5</h2>
        <p class="product-price">$1,100</p>
        <button class="add-to-cart-button" onclick="addToCart('Producto 6', 500)">Agregar al carrito</button>

      </div>

      <div class="product">
        <img src="imagenes/producto7.png" alt="Producto 5" class="product-photo"></a>
        <h2 class="product-name">Producto 5</h2>
        <p class="product-price">$1,100</p>
        <button class="add-to-cart-button" onclick="addToCart('Producto 2', 500)">Agregar al carrito</button>

      </div>

      <div class="product">
        <img src="imagenes/producto8.png" alt="Producto 5" class="product-photo"></a>
        <h2 class="product-name">Producto 5</h2>
        <p class="product-price">$1,100</p>
        <button class="add-to-cart-button" onclick="addToCart('Producto 2', 500)">Agregar al carrito</button>

      </div>

      <div class="product">
        <img src="imagenes/producto9.png" alt="Producto 5" class="product-photo"></a>
        <h2 class="prodct-name">Producto 5</h2>
        <p class="product-price">$1,100</p>
        <button class="add-to-cart-button" onclick="addToCart('Producto 2', 500)">Agregar al carrito</button>

      </div>

      <div class="product">
        <img src="imagenes/producto10.png" alt="Producto 5" class="product-photo"></a>
        <h2 class="product-name">Producto 5</h2>
        <p class="product-price">$1,100</p>
        <button class="add-to-cart-button" onclick="addToCart('Producto 2', 500)">Agregar al carrito</button>

      </div>

      <div class="product">
        <img src="imagenes/producto11.png" alt="Producto 5" class="product-photo"></a>
        <h2 class="product-name">Producto 5</h2>
        <p class="product-price">$1,100</p>
        <button class="add-to-cart-button" onclick="addToCart('Producto 2', 500)">Agregar al carrito</button>

      </div>

      <div class="product">
        <img src="imagenes/producto12.png" alt="Producto 5" class="product-photo"></a>
        <h2 class="product-name">Producto 5</h2>
        <p class="product-price">$1,100</p>
        <button class="add-to-cart-button" onclick="addToCart('Producto 2', 500)">Agregar al carrito</button>

      </div>

      <div class="product">
        <a href="">
        <img src="imagenes/producto13.png" alt="Producto 5" class="product-photo"></a>
        <h2 class="product-name">Producto 5</h2>
        <p class="product-price">$1,100</p>
        <button class="add-to-cart-button" onclick="addToCart('Producto 2', 500)">Agregar al carrito</button>

      </div>

      <div class="product">
        <img src="imagenes/producto14.png" alt="Producto 5" class="product-photo"></a>
        <h2 class="product-name">Producto 5</h2>
        <p class="product-price">$1,100</p>
        <button class="add-to-cart-button" onclick="addToCart('Producto 2', 500)">Agregar al carrito</button>

      </div>

      <div class="product">
        <img src="imagenes/producto15.png" alt="Producto 5" class="product-photo"></a>
        <h2 class="product-name">Producto 5</h2>
        <p class="product-price">$1,100</p>
        <button class="add-to-cart-button" onclick="addToCart('Producto 2', 500)">Agregar al carrito</button>

      </div>
    
  </div>

  <div id="cart">
    <h2>Carrito de compras</h2>
    <ul id="cart-items">
      <!-- Los ítems añadidos al carrito se mostrarán aquí -->
    </ul>
    <p id="total-price">Total: $0.00</p>
  </div>
    <!-- Incluye el archivo JavaScript -->
    <script src="js/carrito.js"></script>

</body>
</html>
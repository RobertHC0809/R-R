// Inicialización del carrito como un array vacío
let cart = [];

// Tabla de precios por tamaño
const sizePrices = {
  'Pequeño': 750,
  'Mediano': 800,
  'Grande': 850,
};

// Función para actualizar el precio cuando se cambia el tamaño
function updatePrice(productId) {
  const sizeSelect = document.getElementById(`${productId}-size`);
  const selectedSize = sizeSelect.value;
  const priceElement = document.querySelector(`#${productId} .product-price`);
  const newPrice = sizePrices[selectedSize];
  priceElement.textContent = `$${newPrice}`;
}

// Función para agregar un producto al carrito
function addToCart(productName, productSize) {
  // Obtener el precio correcto según el tamaño seleccionado
  const productPrice = sizePrices[productSize];

  // Verificar que el productPrice es un valor numérico válido
  if (isNaN(productPrice)) {
    console.error(`Precio inválido para el tamaño seleccionado (${productSize})`);
    return;
  }

  // Buscar si el producto ya está en el carrito
  const existingItem = cart.find(item => item.name === productName && item.size === productSize);

  if (existingItem) {
    existingItem.quantity++;
  } else {
    cart.push({ name: productName, price: productPrice, size: productSize, quantity: 1 });
  }

  updateCart(); // Actualizar la visualización del carrito
}

// Función para eliminar un producto del carrito
function removeFromCart(productName, productSize) {
  const index = cart.findIndex(item => item.name === productName && item.size === productSize);
  if (index !== -1) {
    if (cart[index].quantity > 1) {
      cart[index].quantity--;
    } else {
      cart.splice(index, 1);
    }
  }

  updateCart(); // Actualizar la visualización del carrito
}

// Función para actualizar la visualización del carrito
function updateCart() {
  // Encuentra el elemento de los ítems en el carrito
  const cartItemsElement = document.getElementById('cart-items');
  cartItemsElement.innerHTML = ''; // Limpia los elementos existentes en el carrito

  // Inicializa el total a 0
  let total = 0;

  // Itera a través de los elementos en el carrito
  cart.forEach(item => {
    // Asegúrate de que el precio y la cantidad son números
    const itemPrice = parseFloat(item.price);
    const itemQuantity = parseInt(item.quantity, 10);

    // Calcula el total sumando el precio * cantidad para cada artículo
    total += itemPrice * itemQuantity;

    // Crea la descripción del artículo
    const itemDescription = `${itemQuantity} x ${item.name} (${item.size}) - $${(itemPrice * itemQuantity).toFixed(2)}`;

    // Crea un div para el artículo
    const itemDiv = document.createElement('div');
    itemDiv.className = 'cart-item';
    itemDiv.textContent = itemDescription;

    // Crea un botón de eliminar
    const removeButton = document.createElement('button');
    removeButton.className = 'remove-button';
    removeButton.textContent = 'Eliminar';
    removeButton.onclick = () => removeFromCart(item.name, item.size);
    itemDiv.appendChild(removeButton);

    // Agrega el artículo al carrito
    cartItemsElement.appendChild(itemDiv);
  });

  // Actualiza el total del carrito en el DOM
  const totalPriceElement = document.getElementById('cart-total');
  totalPriceElement.textContent = `Total: $${total}`;
  
}


// Asignar evento de clic a los botones de agregar al carrito
document.querySelectorAll('.add-to-cart-button').forEach(button => {
  button.addEventListener('click', event => {
    event.preventDefault(); // Evitar comportamiento predeterminado

    // Obtener datos del producto asociado al botón
    const productElement = event.target.closest('.product');
    const productName = productElement.querySelector('.product-name').textContent;
    const productSize = productElement.querySelector('.product-size').value;

    // Agregar el producto al carrito
    addToCart(productName, productSize);
  });
});

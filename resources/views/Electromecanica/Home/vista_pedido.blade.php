<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Gestión de Pedidos</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="{{ asset('css/style.css') }}" >

   @php
       $id = Auth::user()->id_cliente;
       $pedidos = DB::select("select *from pedidos");
   @endphp

</head>

<nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-dark navbar-dark py-1 py-lg-0 px-lg-5">
    <a href="index.blade.php" class="navbar-brand d-block d-lg-none">
        <h1 class="display-4 text-white text-uppercase m-0">R&R</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav ml-auto py-0">
            <a href="" class="nav-item nav-link active"></a>
            <a href="#about" class="nav-item nav-link">Sobre Nosotros</a>
            <a href="#service" class="nav-item nav-link">Servicios</a>
            <a href="#project" class="nav-item nav-link">Proyectos</a>
            <a href="#contact" class="nav-item nav-link">Contáctanos</a>

        </div>
        <a href="#home" class="navbar-brand bg-primary px-4 mx-3 d-none d-lg-block">
            <h1 class="display-4 text-white text-uppercase m-0">R&R</h1>
        </a>
        <div class="navbar-nav mr-auto py-0">
            <a href="{{ route('producto') }}" class="nav-item nav-link">Productos</a>

            @if (Route::has('login'))
  @auth
  <a href="{{ route('producto') }}" class="nav-item nav-link"> Pedidos</a>
  <a href="#" class="nav-item nav-link">Carrito</a>
  <form method="POST" action="{{ route('logout') }}">
    @csrf
  <a class="nav-item nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
    this.closest('form').submit();">Cerrar sesión</a>
  </form>
  @else
      <a href="{{ route('Formulario') }}" class="nav-item nav-link">Inicia Sesión</a>

      @if (Route::has('register'))
          <a href="{{ route('Formulario') }}" class="nav-item nav-link">Registrate</a>
      @endif
  @endauth
@endif
        </div>
    </div>
</nav>

<body>
   
 @include ('Electromecanica/RYR_ADMIN/admin_header');

<section class="show-products">

   @php
   $pedidos = DB::select("select *from pedidos");
@endphp
<style>
   /* Estilos para la tabla */
   .table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
   }

   .table th,
   .table td {
      padding: 1rem;
      border-bottom: 1px solid var(--light-color);
      text-align: left;
   }

   .table th {
      background-color: var(--light-bg);
      font-weight: 500;
      font-size: 1.8rem;
   }

   /* Estilos para las filas impares */
   .table tbody tr:nth-child(odd) {
      background-color: var(--light-bg);
   }

   /* Estilos para las celdas */
   .table td {
      font-size: 1.6rem;
      color: var(--black);
   }

   /* Estilos para el contenedor de la tabla */
   .box {
      margin-top: 20px;
   }
</style>

<table class="table">
<thead>
   <tr>
      <th>ID Pedido</th>
      <th>ID Usuario</th>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Fecha Pedido</th>
      <th>Estado</th>
      <th>Acción</th>
   </tr>
</thead>
<tbody>
   @foreach ($pedidos as $pedi)
   <tr>
      <td>{{$pedi->id}}</td>
      <td>{{$pedi->ID_Usuario}}</td>
      <td>{{$pedi->producto}}</td>
      <td>{{$pedi->cantidad}}</td>
      <td>{{$pedi->fecha_pedido}}</td>
      <td>{{$pedi->estado}}</td>
      <td>
         <form method="get" action="{{ route('mostrar_pedido', ['id_pedido' => $pedi->id]) }}">
            <button type="submit" class="option-btn">Actualizar</button>
         </form>
         <form action="{{ route('eliminar_pedido', ['id_pedido' => $pedi->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button onclick="return confirm('Seguro/a que quieres borrar el pedido registrado?');" class="delete-btn" type="submit" class="delete-btn">Eliminar</button>
         </form>
      </td>
   </tr>
   @endforeach
</tbody>
</table>
</div>

</section>

<script src="js/admin_script.js"></script>

</body>
</html>

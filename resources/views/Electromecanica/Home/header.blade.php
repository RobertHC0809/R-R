<head>
    <meta charset="utf-8">
    
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('imagenes/icono.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
</head> 

    <!-- Navbar Start -->
    <nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-dark navbar-dark py-1 py-lg-0 px-lg-5">
        <a href="index.blade.php" class="navbar-brand d-block d-lg-none">
            <h1 class="display-4 text-white text-uppercase m-0">R&R</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto py-0">
                <a href="" class="nav-item nav-link active"></a>
                <a href="{{ route('Inicio') }}" class="nav-item nav-link">Volver a inicio</a>
                <a href="{{ route('producto') }}" class="nav-item nav-link">Productos</a>

            </div>
            <a href="{{ route('Inicio') }}" class="navbar-brand bg-primary px-4 mx-3 d-none d-lg-block">
                <h1 class="display-4 text-white text-uppercase m-0">R&R</h1>
            </a>
            <div class="navbar-nav mr-auto py-0">


                @if (Route::has('login'))
      @auth

      <a href="{{ route('carrito') }}" class="nav-item nav-link">Carrito</a>
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
    <!-- Navbar End -->

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/easing.min.js') }}"></script>
        <script src="{{ asset('js/waypoints.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('js/lightbox.min.js') }}"></script>
    
        <!-- Contact Javascript File -->
        <script src="{{ asset('js/jqBootstrapValidation.min.js') }}"></script>
        <script src="{{ asset('js/contact.js') }}"></script>
    
        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js') }}"></script>
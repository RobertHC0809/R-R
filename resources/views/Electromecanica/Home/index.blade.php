<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Electromecánica R&R</title>
    
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

<body data-spy="scroll" data-target=".navbar" data-offset="51">

    
    <!-- Navbar Start -->
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
      <a href="{{ route('pedidos') }}" class="nav-item nav-link"> Pedidos</a>

      <a href="{{ route('carrito') }}" class="nav-item nav-link">Carrito</a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf

      <a class="nav-item nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
        this.closest('form').submit();">Cerrar sesión</a>

        <!--
// v0 by Vercel.
// https://v0.dev/t/r5Fccb0eRVm
-->
      </div>
    </div>
      </form>
      <div class="user-info">
        <a href="{{ route('profile.edit') }}" class="nav-item nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
            <div class="user-details">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-email">{{ Auth::user()->email }}</div>
            </div>
        </a>
    </div>
    <style>
        .user-info .user-details {
    display: grid;
    gap: 0.5rem; /* Ajusta el espacio entre el nombre y el correo */
}

.user-info .user-name {
    font-size: 1rem; /* Tamaño del texto para el nombre */
    font-weight: bold; /* Hace el texto del nombre más grueso */
    color: white; /* Cambia el color del texto */
}

.user-info .user-email {
    font-size: 0.875rem; /* Tamaño del texto para el correo */
    color: #ccc; /* Cambia el color del texto del correo */
}

    </style>
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


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 pb-5" id="home">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item position-relative active" style="height: 100vh; min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="imagenes/2.jpeg" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Electromecánica R&R</h4>
                            <h3 class="display-2 font-secondary text-white mb-4">No dudes en pedir tu pieza</h3>
                            <a class="btn btn-light font-weight-bold py-3 px-5 mt-2 btn-scroll" href="#contact">Contáctanos</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item position-relative" style="height: 100vh; min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="imagenes/5.jpeg" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Electromecánica R&R</h4>
                            <h3 class="display-2 font-secondary text-white mb-4">¿Qué esperas para ordenar tu pieza?</h3>
                            <a class="btn btn-light font-weight-bold py-3 px-5 mt-2 btn-scroll" href="#contact">Contáctanos</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev justify-content-start" href="#header-carousel" data-slide="prev">
                <div class="btn btn-primary px-0" style="width: 68px; height: 68px;">
                    <span class="carousel-control-prev-icon mt-3"></span>
                </div>
            </a>
            <a class="carousel-control-next justify-content-end" href="#header-carousel" data-slide="next">
                <div class="btn btn-primary px-0" style="width: 68px; height: 68px;">
                    <span class="carousel-control-next-icon mt-3"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


<!-- About Start -->
<div class="container-fluid py-5" id="about">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid mb-4 mb-lg-0" src="imagenes/1.jpeg" alt="">
            </div>
            <div class="col-lg-7">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Sobre Nosotros</h6>
                <h1 class="display-4 mb-3"><span class="text-primary"></span>Misión</h1>
                <p>Llevar el mejor servicio de ventas, instalaciones, mantenimientos electromecánicos y obras a fines, a cada una de las empresas o personas que soliciten nuestros servicios profesionales, realizando un trabajo de calidad y eficiencia, innovando día a día el trabajo, para así garantizar la excelencia de la labor en toda la República Dominicana.</p>
            </div>
        </div>
    </div>
    <hr class="divider">
</div>

<!-- About Start -->
<div class="container-fluid py-5" id="about">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid mb-4 mb-lg-0" src="imagenes/3.jpeg" alt="">
            </div>
            <div class="col-lg-7">
                <h1 class="display-4 mb-3"><span class="text-primary"></span>Visión</h1>
                <p>Ser la empresa número uno en el mercado profesional del país en ventas y servicios electromecánicos, asumiendo la responsabilidad y el compromiso de la satisfacción de nuestros clientes y personal de trabajo.</p>
            </div>
        </div>
    </div>
    <hr class="divider">
</div>

<!-- About Start -->
<div class="container-fluid py-5" id="about">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid mb-4 mb-lg-0" src="imagenes/4.jpeg" alt="">
            </div>
            <div class="col-lg-7">
                <h1 class="display-4 mb-3"><span class="text-primary"></span>Valores</h1>
                <p>Liderazgo, 
                                    Responsabilidad,
                                    Honestidad,
                                    Lealtad,
                                    Integridad, 
                                    Dedicación,
                                    Humildad,
                                    Iniciativa,
                                    Creatividad, 
                                    Respeto,
                                    Eficiencia,
                                    Trabajo en equipo,
                                    Compañerismo,
                                    Identidad en el trabajo.</p>
            </div>
        </div>
    </div>
    <hr class="divider">
</div>
<!-- About End -->



    <!-- Service Start -->
    <div class="container-fluid py-5" id="service">
        <div class="container py-5">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Servicios</h6>
                <h1 class="font-secondary display-4">Ofrecemos estos:</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="product-item mb-2">
                        <div class="product-img">
                            <img class="img-fluid" src="imagenes/6.jpeg" alt="">

                                <i class="fa fa-2x fa-plus text-white"></i>
                            </a>
                        </div>
                        <div class="bg-secondary text-center p-4">
                            <h3 class="m-0">Generador</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="product-item mb-2">
                        <div class="product-img">
                            <img class="img-fluid" src="imagenes/7.jpeg" alt="">
                            
                                <i class="fa fa-2x fa-plus text-white"></i>
                            </a>
                        </div>
                        <div class="bg-secondary text-center p-4">
                            <h3 class="m-0">Panel board</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="product-item mb-2">
                        <div class="product-img">
                            <img class="img-fluid" src="imagenes/9.jpeg" alt="">

                                <i class="fa fa-2x fa-plus text-white"></i>
                            </a>
                        </div>
                        <div class="bg-secondary text-center p-4">
                            <h3 class="m-0">Main breaker Principal</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="divider">

    <!-- Service End -->

    <div class="container py-5">
        <div class="section-title position-relative text-center">
            <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Escríbenos</h6>
            <h1 class="font-secondary display-4">Solicita un servicio</h1>
        </div>

        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('valid_men') }}" method="post" class="contact-form">
                    @csrf
                    <div class="form-group">
                        <label for="nombre" class="form-label h4">Nombre:</label>
                        <input type="text" name="nombre" required maxlength="50" placeholder="Ingresa tu nombre" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label h4">Correo electrónico:</label>
                        <input type="email" name="email" required maxlength="50" placeholder="Ingresa tu email" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="form-label h4">Teléfono:</label>
                        <input type="tel" name="telefono" required maxlength="12" min="0" max="9999999999" placeholder="Ingresa tu teléfono" class="form-control form-control-lg"> 
                    </div>
                    <div class="form-group">
                        <label for="mensaje" class="form-label h4">Servicio:</label>
                        <select name="mensaje" class="form-control form-control-lg" required>
                            <option value="">Seleccione un servicio</option>
                            <option value="Main Breaker Principal">Main Breaker Principal</option>
                            <option value="Panel Board">Panel Board</option>
                            <option value="Generador">Generador</option>
                            <option value="Venta de productos en Fisico">Venta de productos en Fisico</option>
                            <option value="Desmontar cables">Desmontar cables</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary font-weight-bold py-3 px-5">Solicitar servicio</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Gallery Start -->
    <div class="container-fluid bg-gallery" id="project" style="padding: 120px 0; margin: 90px 0;">
        <div class="section-title position-relative text-center" style="margin-bottom: 120px;">
            <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Proyectos</h6>
            <h1 class="font-secondary display-4 text-white">Galeria de Proyectos</h1>
        </div>
        <div class="owl-carousel gallery-carousel">
            <div class="gallery-item">
                <img class="img-fluid w-100" src="imagenes/Galeria de proyectos.jpeg" alt="">


                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="imagenes/Galeria de proyectos1.jpeg" alt="">

                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="imagenes/Galeria de proyectos2.jpeg" alt="">

                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="imagenes/Galeria de proyectos3.jpeg" alt="">

                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="imagenes/Galeria de proyectos4.jpeg" alt="">

                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="imagenes/3.jpeg" alt="">

                </a>
            </div>
        </div>
    </div>
    
    <!-- Gallery End -->


    <!-- FAQs Start -->
    <div class="container-fluid py-5" id="faqs">
        <div class="container py-5">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Productos</h6>
                <h1 class="display-4">Todos Nuestros productos</h1>
                
                <div class="product-container">
                    <div class="product">
                        <img src="imagenes/producto1.png" alt="Producto 1" class="product-photo">
                        <h2 class="product-name">G1/4 NPT VALVULAS SOLENOIDES 1/4</h2>
                        <p class="description">RD$240</p>
                    </div> 
                    <div class="product">
                        <img src="imagenes/producto2.png" alt="Producto 2" class="product-photo">
                        <h2 class="product-name">G1/4 NPT FILTRO REGULADOR 1/4</h2> 
                        <p class="description">RD$685</p>
                    </div>
                    <div class="product">
                        <img src="imagenes/producto3.png" alt="Producto 3" class="product-photo">
                        <h2 class="product-name">G1/4 NPT FILTRO REGULADOR Y LUBRICADOR 1/4</h2> 
                        <p class="description">RD$890</p>
                    </div>
                    <div class="product">
                        <img src="imagenes/producto5.png" alt="Producto 4" class="product-photo">
                        <h2 class="product-name">ZG1/2 NPT VALVULAS DE ANGULO 1/2</h2> 
                        <p class="description">RD$960</p>
                    </div>
                </div>
    
                <a class="btn btn-primary font-weight-bold py-3 px-5 mt-4 btn-scroll" href="{{ route('producto') }}">Ver todos los productos</a>
            </div>
        </div>
        <hr class="divider">
    </div>
    
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
            color: #333;
        }
    
        .product-container {
            display: flex; 
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
            gap: 20px;
        }
    
        .product {
            flex: 1 1 calc(25% - 40px); 
            max-width: calc(25% - 40px);
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
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
            border-radius: 8px;
        }
    
        .product-name {
            font-size: 22px;
            margin-bottom: 10px;
            color: #333;
            font-weight: 500;
        }
    
        .description {
            font-size: 16px;
            color: #0c73d3;
        }
    
        /* Responsive Styles */
        @media (max-width: 1200px) {
            .product {
                flex: 1 1 calc(33.333% - 40px);
                max-width: calc(33.333% - 40px);
            }
        }
    
        @media (max-width: 992px) {
            .product {
                flex: 1 1 calc(50% - 40px);
                max-width: calc(50% - 40px);
            }
        }
    
        @media (max-width: 768px) {
            .product {
                flex: 1 1 calc(100% - 40px);
                max-width: calc(100% - 40px);
            }
        }
    
        .section-title {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    
        .btn-scroll {
            margin: 20px auto; /* Add auto margins to center the button */
        }
    </style>
    <!-- FAQs End -->

    <!-- Contact Start -->
    <div class="container-fluid py-5" id="contact">
        <div class="container py-5">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Contáctanos</h6>
                <h1 class="font-secondary display-4">Escríbenos</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form action="https://api.web3forms.com/submit" method="POST">
                            <input type="hidden" name="access_key" value="06d46ab7-769c-4aec-9d21-9c64bc88d91e">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Tu nombre" required="required"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Tu dirección de email" required="required"/>
                                <p class="help-block text-danger"></p>
                            </div>  
                            <div class="form-group">
                                <textarea class="form-control form-control-lg" rows="8" cols="80" name="message" id="comment" placeholder="Mensaje" required="required"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary font-weight-bold py-3 px-5" type="submit" class="submit">Enviar mensaje</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

    <!-- Contact End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-12 mb-4 px-4">
                <div class="row mb-5 p-4" style="background: rgba(256, 256, 256, .05);">
                    <div class="col-md-4">
                        <div class="text-md-center">
                            <h5 class="text-primary text-uppercase mb-2" style="letter-spacing: 5px;">Dirección</h5>
                            <p class="mb-4 m-md-0">German Soriano, Santiago de los Caballeros 51000</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-md-center">
                            <h5 class="text-primary text-uppercase mb-2" style="letter-spacing: 5px;">Email</h5>
                            <p class="mb-4 m-md-0">info@electromecanicaryr.com</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-md-center">
                            <h5 class="text-primary text-uppercase mb-2" style="letter-spacing: 5px;">Contáctanos</h5>
                            <p class="m-0">(809) 575-0550</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <p>Redes</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="https://www.facebook.com/electromecanicaryr/?locale=es_LA"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="https://www.linkedin.com/in/electromecanica-r-y-r-1a3046252/"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-lg btn-outline-light btn-lg-square" href="https://www.instagram.com/electromecanicaryr/?hl=es-la"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Horarios</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white btn-scroll mb-2">Lunes	- 8:00A.M 5:00P.M</a>
                            <a class="text-white btn-scroll mb-2"></i>Martes - 8:00A.M 5:00P.M</a>
                            <a class="text-white btn-scroll mb-2"></i>Miércoles - 8:00A.M 5:00P.M</a>
                            <a class="text-white btn-scroll mb-2"></i>Jueves - 8:00A.M 5:00P.M</a>
                            <a class="text-white btn-scroll mb-2"></i>Viernes - 8:00A.M 5:00P.M</a>
                            <a class="text-white btn-scroll mb-2"></i>Sábado - 8:00A.M 12:00P.M</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 mb-5">
                <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;"></h5>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Tu Dirección Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Iniciar Sesión</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white text-center border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .05) !important;">
        <p class="m-0 text-white">&copy; <a href="#"></a>Derechos de autor Electromecánica R&R</p>
    </div>
    <!-- Footer End -->


    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-outline-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/easing.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/lightbox.min.js') }}"></script>
    <script src="{{ asset('js/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset ('js/admin_script.js') }}"></script>
</body>

</html>
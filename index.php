<?php
include 'data/DBGestLib.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $comentario = $_POST['comentario'];

    $DBGestion = new DBGestLib();

    try{
        $exito = $DBGestion->insertContacto($nombre, $correo, $asunto, $comentario);
        if ($exito) {
            header('Location: formexitoso.php');
            exit;
        } else {
            echo '<div class="alert alert-danger justify-content-center">Error al guardar los datos.</div>';
        }
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger justify-content-center">Error al guardar los datos: ' . $e->getMessage() . '</div>';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Esteban Books</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Esteban Books</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#listado">Libros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Autores</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" id="listado">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Bienvenido a la mejor Librería Online</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Esteban Books tiene todos los libros que puedas necesitar, desde libros de negocios a libros de fantasía. Contamos con todo tipo de libro que ocupes!</p>
                        <a class="btn btn-primary btn-xl" href="libros.php">Libros</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Nuestros autores!</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">En Esteban Books contamos con los mejores autores de nuestra época!</p>
                        <a class="btn btn-light btn-xl" href="autores.php">Autores</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">A Tu Servicio</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Joyas Literarias</h3>
                            <p class="text-muted mb-0">Puedes leer los mejores libros!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-calendar3 fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">A La Fecha</h3>
                            <p class="text-muted mb-0">Nuestro listado de libros se actualiza en tiempo real.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-people fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Autores</h3>
                            <p class="text-muted mb-0">Contamos con tus autores favoritos!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Hecho con Amor</h3>
                            <p class="text-muted mb-0">Brindamos nuestros servicios con todo nuestro cariño y amor </p>
                        </div>
                    <br>
                    <br>
                    <br>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                 <a class="btn btn-dark btn-xl" href="tiendas.php">Nuestras Tiendas</a>
                </div>
            </div>
        </section>
       
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">Un libro al día alegra tu vida</h2>
                <h2>:)</h2>
            </div>
        </section>
        <!-- Contact-->
    <section class="page-section" id="contact">
      <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Pongámonos en contacto!</h2>
                <hr class="divider" />
                <p class="text-muted mb-5">Si tiene algún comentario que quiera hacernos llegar, a continuación puede realizarlo.</p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                <form id="contactForm" method="post">
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" name="nombre" type="text" placeholder="Enter your name..." required />
                        <label for="name">Nombre Completo</label>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="correo" type="email" placeholder="name@example.com" required />
                        <label for="email">Correo Electrónico</label>
                    </div>
                    <!-- Asunto input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="asunto" name="asunto" type="text" placeholder="Enter your message here..." required />
                        <label for="asunto">Asunto</label>
                    </div>
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="message" name="comentario" type="text" placeholder="Enter your message here..." style="height: 10rem" required></textarea>
                        <label for="message">Comentario</label>
                    </div>
                    <!-- Submit Button-->
                    <div class="d-grid">
                        <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2023 - Esteban Montero Sánchez 2022-0376</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

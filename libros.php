<?php
include 'data/DBGestLib.php';
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
        <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <a class="navbar-brand" href="index.php">Esteban Books</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#page-top">Inicio</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead" id="listado">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Listado de nuestros libros</h1>
                    <hr class="divider" />
                </div>
                
            </div>
            
        </div>
    </header>
   
    <!-- Call to action-->
    <section class="page-section bg-dark text-white">
        <br>
        <div class="container px-4 px-lg-5 text-center">
        <p>Haz click en el libro que te interese para más detalles!</p>
            <table class="table table-dark table-bordered table-striped table-hover">
                <tr>
                    <th>Código</th>
                    <th>Libro</th>
                    <th>Género</th>
                    <th>Precio</th>
                </tr>
                <?php
                $DBGestion = new DBGestLib();
                $libros = $DBGestion->getLibros();

                foreach ($libros as $registro) {
                    printf(
                        "<tr data-toggle='modal' data-target='#bookModal' data-book-name='%s' data-book-description='%s'>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%d</td>
                        </tr>",
                        $registro['titulo'],
                        $registro['notas'],
                        $registro['id_titulo'],
                        $registro['titulo'],
                        $registro['tipo'],
                        $registro['precio']
                    );
                }
                ?>
            </table>
            <br>
            <h2 class="mb-4">Un libro al día alegra tu vida</h2>
            <h2>:)</h2>
        </div>
    </section>
    
    <!-- Modal para mostrar detalles del libro -->
    <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookModalLabel">Detalles del Libro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 id="bookName"></h5>
                    <p id="bookDescription"></p>
                </div>
            </div>
        </div>
    </div>
    
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
    <script>
    // Mostrar detalles del libro cuando se haga clic en una fila de la tabla
    $(document).ready(function() {
        $('tr[data-toggle="modal"]').click(function() {
            const bookName = $(this).data('book-name');
            const bookDescription = $(this).data('book-description');

            $('#bookName').text(bookName);
            $('#bookDescription').text(bookDescription);

            // Abrir el modal manualmente
            $('#bookModal').modal('show');
        });
    });
</script>


</body>
</html>

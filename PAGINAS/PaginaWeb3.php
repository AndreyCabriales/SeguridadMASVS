
<!DOCTYPE html>
<html lang="en">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GoTaxi</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../estilos/PaginaWeb.css">
    </head>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: #CF6754 ;">
            <a class="nav-brand"><img src="../img/Logo.png" style="height:120px; width:90px;" id="img1"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item-active">
                        <a class="nav-link txtnav" href="PaginaWeb.html">Inicio<span ></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link txtnav" href="PaginaWebTaxis.html"> Taxis</a>
                    </li>
                    <li class="nav-item-dropdown">
                        <a class="nav-link dropdown-toggle txtnav" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opciones
                    </a>
                    <div class="dropdown">
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item txtnav" href="PaginaWebPerfil.html">Perfil</a></li>
                          <hr>
                          <li><a class="dropdown-item txtnav" href="PaginaWebNosotros.html">Sobre Nosotros</a></li>
                          <hr>
                          <li><a class="dropdown-item txtnav" href="PaginaWebFAQ´s.html">FAQ´s</a></li>
                        </ul>
                      </div>
                </ul>
                </ul>
                
    </header>
    <body>
        <div class="main-content">
            <div id="Contenido">
                <h2>GoTaxi</h2>
                <p class="contenido">La solucion a tus problemas esta aqui</p>
                <h2>"Rapidez y fluidez tus <br>taxis seguros, tus GoTaxi"</h2>
            </div>
            <div id="carrusel" class="carousel slide " data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#carrusel" data-slied-to="0" class="active"></li>
                    <li data-target="#carrusel" data-slied-to="1"></li>
                    <li data-target="#carrusel" data-slied-to="2"></li>
                </ul>
                
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../img/taxi4.jpeg" class="d-block w-100" id="img1" alt="Imagen 1">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Primera Imagen</h5>
                            <p>Descripción de la primera imagen.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../img/taxi2.jpg" class="d-block w-100"  id="img2" alt="Imagen 2">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Segunda Imagen</h5>
                            <p>Descripción de la segunda imagen.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../img/taxi3.jpg" class="d-block w-100" id="img3" alt="Imagen 3">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Tercera Imagen</h5>
                            <p>Descripción de la tercera imagen.</p>
                        </div>
                    </div>                
                </div>
                <a class="carousel-control-prev" href="#carrusel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carrusel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
    

        </div>

    </body>
    <footer class="footer">
        &copy; 2024 Derechos Reservados
        <hr>
    </footer>    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivery.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
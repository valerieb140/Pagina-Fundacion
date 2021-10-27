<!--MENU PRINCIPAL-->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand me-5" href="https://localhost/PaginaFundacion-cms2/CMS/noticia.php">
        <img src="images/computer.png" width="30" height="30" alt="CMS"><span class="fs-4 ms-2 fw-light">CMS</span> 
      </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="https://localhost/PaginaFundacion-cms2/CMS/noticia.php">Noticias <span class="sr-only">(current)</span></a>
                    <!--<a class="nav-item nav-link" href="http://localhost/upload-pruebas-respaldo18-06-2021/servicios.php">Servicios</a>-->

                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Servicios
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="https://localhost/PaginaFundacion-cms2/CMS/curso.php">Cursos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="https://localhost/PaginaFundacion-cms2/CMS/taller.php">Talleres</a></li>
                        </ul>
                    </div>

                    <a class="nav-item nav-link" href="https://localhost/PaginaFundacion-cms2/CMS/slider.php">Slider</a>
                    <a class="nav-item nav-link" href="https://localhost/PaginaFundacion-cms2/CMS/galeria.php">Galeria</a>
                </div>
            </div>

        <div class="d-flex">
            
            <p class="text-end me-2 fw-light text-light pt-1 mb-0"><?php echo $_SESSION["s_usuario"];?></p>  
            <img src="images/user.png" class="rounded float-end" width="30" height="30" alt="user"> 
            <a href="bd/logout.php" role="button">
                <img src="images/cerrar-sesion.png" class="rounded float-end mt-1 ms-2" width="25" height="25" alt="user"> 
            </a>
            
        </div>

</nav>
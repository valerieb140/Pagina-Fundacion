<?php

$mvc= new mvccontroller();
$arrayGeneral = $mvc-> peticionPaginasController('Inicio');

$dataSld = $arrayGeneral[0];
$dataEvent = $arrayGeneral[1];
?>

<section>
    <!--Encabezado-->
    <h3 class="text-center display-4">Descubre nuestras actividades</h3>

    <!--Slider Principal-->
    <div class="row row-slider justify-content-center">
      <div class="col-xl-10 col-lg-12 col-slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">

          <?php                            
            foreach($dataSld as $dat) { 
          ?>

          <?php if ($dat['id_slider'] == 1): ?>
            <div class="carousel-item active">
              <a href="<?php echo $dat['enlace_sld'] ?>">
                <img src="CMS/images/<?php echo $dat['img_sld'] ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5><?php echo $dat['titulo_sld'] ?></h5>
                  <p><?php echo $dat['descrip_sld'] ?></p>
                </div>
              </a>
            </div>
          <?php elseif ($dat['id_slider'] != 1 ): ?>

            <div class="carousel-item">
              <a href="<?php echo $dat['enlace_sld'] ?>">
                <img src="CMS/images/<?php echo $dat['img_sld'] ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5><?php echo $dat['titulo_sld'] ?></h5>
                  <p><?php echo $dat['descrip_sld'] ?></p>
                </div>
              </a>
            </div>
          <?php endif; ?>

          <?php
            }
          ?>  

        </div>


        <button class="carousel-control-prev me-5 pe-5" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next ms-5" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      </div>
    </div>

</section>

<section class="mt-5 pt-5 mb-5">

    <!--Encabezado y descripcion-->
    <h3 class="text-center display-4">Eventos que podrían interesarte</h3>
    <p class="text-center fs-5">En alguno de nuestros entes habra presentacion, dale clik y averigua mas!</p>
      
    <!--Cards con eventos recientes-->
    <section class="post-list">
      <div class="content-inicio">

          <?php                            
              foreach($dataEvent as $dat) {                                                        
          ?>

              <article class="post">
                  <a class="text-decoration-none text-dark" href="index.php?id=<?php echo $dat['id_noticia'] ?>">
                      <div class="post-header">
                          <img class="post-img-1" src="CMS/images/<?php echo $dat['img_not'] ?>">
                      </div>  
                      <div class="post-body">
                          <div class="row">
                            <span><?php echo $dat['fecha_not'] ?></span>
                            <h5><?php echo $dat['titulo_not'] ?></h5>
                            <p class="descripcion-noti-inicio mb-0"  style="height:100px;"><?php echo $dat['descrip_not'] ?></p>
                          </div>

                          <div class="row mt-1">
                            <a href="index.php?id=<?php echo $dat['id_noticia'] ?>" class="post-link-inicio">Leer más...</a>
                          </div>
                      </div>
                  </a>
              </article>

          <?php
              }
          ?>    

      </div>
    </section>
  
</section>

<section class="row row-img-inicio justify-content-center">
  <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12  mt-5 pt-5 mb-5">
        <a href="index.php?action=noticias">
          <div class="card bg-dark text-white justify-content-center align-items-center">
            <img src="views/images/foto-15.jpg" class="card-img img-fluid" alt="...">
            <div class="card-img-overlay mt-5 ms-5 contenedor">
              <h5 class="card-title display-4 my-5 efect">No te pierdas de nuestras noticias</h5>
              <p class="card-text fs-4 w-50 efect">Te puedes enterar de las noticias y eventos más recientes gracias a nuestra sección de noticias.</p>
            </div>
          </div>
        </a>
  </div>
</section>

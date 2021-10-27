<?php

$mvc= new mvccontroller();
$data = $mvc-> peticionPaginasController('Noticias');

?>


<!--Cuerpo de la página-->
<section class="post-list">
      <div class="content">

          <?php                            
              foreach($data as $dat) {                                                        
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
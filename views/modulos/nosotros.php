<?php 

    $mvc= new mvccontroller();
    $dataGal = $mvc-> peticionPaginasController('Nosotros');

?>

<!--AREA DE MISION, VISION E HISTORIA-->
<section class="post-list">
      <div class="content">
        <article class="post">
                <div class="post-header-nosotros">
                    <img class="post-img-1" src="views/images/foto-6.jpg">
                </div>  
                <div class="post-body">
                    <div class="row">                
                      <h3>Mision</h3>
                      <p class="descripcion-noti-inicio mb-0"  style="height:100px;">Construcción y difusión de la identidad caraqueña en el ámbito de la cultura
                  histórica, política, artística, patrimonial, ecológica, deportiva, económica, turística y
                  emocional.</p>
                    </div>
                </div>          
        </article>
        <article class="post">
                <div class="post-header-nosotros">
                    <img class="post-img-1" src="views/images/foto-8.jpg">
                </div>  
                <div class="post-body">
                    <div class="row">                
                      <h3>Vision</h3>
                      <p class="descripcion-noti-inicio mb-0"  style="height:100px;">Nos proyectamos como una organización líder en el reconocimiento y
                  posicionamiento de la identidad caraqueña en el contexto nacional e internacional.</p>
                    </div>
                </div>          
        </article>
        <article class="post">
                <div class="post-header-nosotros">
                    <img class="post-img-1" src="views/images/foto-14.jpg">
                </div>  
                <div class="post-body">
                    <div class="row">                
                      <h3>Historia</h3>
                      <p class="descripcion-noti-inicio mb-0"  style="height:100px;">texto de descripcion.</p>
                    </div>
                </div>          
        </article>
      </div>
</section>

<!--SECCION ORGANIGRAMA-->
<section class="" style="max-width: 1000px;
    margin: 1.8em auto;">
  <h2 class="text-center">Organigrama de la institución</h2>
  <img src="views/images/organigrama.jpg" alt="Organigrama" width="100%" >
  
</section>

<!--SECCION GALERIA-->
<section class="mt-5 bg-dark">
  <div class="container py-5">
    <h1 class="display-5 text-center text-light">GALERIA DE LA FUNDACIÓN</h1>
    <div class="row">
      <?php                            
        foreach($dataGal as $dat) {                                                        
      ?>

      <div class="col-xlg-3 col-lg-3 col-md-6 col-sm-12 mt-3">
        <img src="CMS/images/<?php echo $dat['img_gal'] ?>" class="" width="100%" height="auto" alt="">
        <p class="text-center text-light">
          <?php echo $dat['tit_img_gal'] ?>
        </p>
      </div>

      <?php
        }
      ?>  

    </div>
  </div>
</section>
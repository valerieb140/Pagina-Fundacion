<?php
    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $id = (isset($_GET['id'])) ? $_GET['id'] : '';


    $consulta = "SELECT id_noticia, titulo_not, contenido_not, fecha_not, img_not, descrip_not FROM noticia WHERE id_noticia='$id' ";       
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

?>


<section>
    <div class="row row justify-content-center ps-5 pe-5 pt-4">    
            <?php                            
                foreach($data as $dat) {                                                        
            ?>
                <!--AREA DE NOTICIA-->
                <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12">
                    <h1 class=""><?php echo $dat['titulo_not'] ?></h1>
                    <span >
                        <small>Fecha: <?php echo $dat['fecha_not'] ?></small>
                    </span>
                    <p class="mt-4" style="text-align: justify; ">
                        <?php echo $dat['contenido_not'] ?>
                    </p>
                    <img src="CMS/images/<?php echo $dat['img_not'] ?>" width="100%" height="300px" class="mt-3 mb-5" alt="">
                    
                </div>

            <?php
                }
            ?>  

    </div>
</section>
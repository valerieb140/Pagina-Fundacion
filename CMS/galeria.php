<?php
    session_start();

    if($_SESSION["s_usuario"] === null){
        header("Location: ../index.php");
    }

    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();


    $consulta = "SELECT id_galeria, img_gal, tit_img_gal FROM galeria"; //GALERIA
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $dataGal=$resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<?php include 'partes/head.php';?>

<body>
    <!--MENU PRINCIPAL-->
    <?php include 'partes/menu-principal.php';?>

    <!--CONTENIDO-->
    <div class="container">
        <h1 class="border-bottom text-secondary">AREA DE GALERIA</h1>

        <!-- BOTON NUEVO -->
        <button id="btnNuevoGaleria" type="button" class="btn btn-success mt-4 mb-4" data-toggle="modal">Nuevo</button> 

        <!-- Modal -->
        <div class="modal fade" id="modalGaleria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!--FORMULARIO DE IMAGEN DE GALERIA-->
                        <div class="row">
                            <div id="content" class="col-lg-12">
                                <form method="post" action="#" enctype="multipart/form-data">
                                    <div class="card" style="/*width: 18rem;*/">
                                        <img class="card-img-top" height="250px" src="images/image-fondo.png">
                                        <div class="card-body">
                                            <!--<h5 class="card-title">Sube una foto</h5>-->
                                            <!--<p class="card-text">Sube una imagen para probar esta demostración. La imagen puede ser en formato .jpg, o .png.</p>-->
                                            <label for="image">Imagen Destacada</label>
                                            <div class="row">
                                                
                                                <div class="col-10">
                                                    <div class="form-group">
                                                        <input type="file" class="form-control-file form-control" name="image" id="image" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col">
                                                    <input type="button" class="btn btn-primary upload" value="Subir">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!--FORMULARIO DE DATOS DE GALERIA-->
                        <div class="row">
                            <div class="col">
                                <form id="formGaleria" >  

                                    <div class="form-group">
                                            <label for="titulo-gal" class="col-form-label">Titulo de Imagen</label>
                                            <input type="text" class="form-control" id="titulo-gal" required>
                                    </div>
                                        
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" id="btnCancelarGaleria">Cancelar</button>
                                        <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                                    </div>

                                </form>   
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--TABLA-->
        <div class="container">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">        
                            <table id="tablaGaleria" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Id</th>
                                    <th>Imagen Galeria</th>                            
                                    <th>Titulo de Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                            
                                foreach($dataGal as $dat) {                                                        
                                ?>
                                <tr>
                                    <td><?php echo $dat['id_galeria'] ?></td><!--id-->

                                    <td><img  width="300px" height="100px" src="images/<?php echo $dat['img_gal'] ?>">
                                    <span style="display:none;"><?php echo $dat['img_gal'] ?></span>
                                    </td> <!--imagen-->
                                    <td><?php echo $dat['tit_img_gal'] ?></td><!--id-->
                                    <td></td>
                                </tr>
                                <?php
                                    }
                                ?>                                
                            </tbody>        
                        </table>                    
                        </div>
                    </div>
            </div>  
        </div>  

        <div class="footer-content row" style="visibility: hidden;">
            <div class="col-lg-12">
                <div class="pull-right">
                    <a href="https://www.jose-aguilar.com/blog/como-subir-una-imagen-con-jquery-ajax-php" class="btn btn-secondary">
                        <i class="fa fa-reply"></i> volver al tutorial
                    </a>
                    <a href="https://www.jose-aguilar.com/scripts/jquery/upload-image-with-ajax/upload-image-with-ajax.zip" class="btn btn-primary">
                        <i class="fa fa-download"></i> Descargar
                    </a>
                </div>
            </div>
        </div>
        
    </div>

    <!--FOOTER-->
    <?php include 'partes/footer.php';?>

</body>
</html>
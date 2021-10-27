<?php
    session_start();

    if($_SESSION["s_usuario"] === null){
        header("Location: ../index.php");
    }

    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();


    $consulta = "SELECT id_slider, img_sld, titulo_sld, descrip_sld, enlace_sld FROM slider"; //SLIDER
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $dataSld=$resultado->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<?php include 'partes/head.php';?>

<body>
    <!--MENU PRINCIPAL-->
    <?php include 'partes/menu-principal.php';?>

    <!--CONTENIDO-->
    <div class="container">
        <h1 class="border-bottom text-secondary">AREA DE SLIDER</h1>

        <!-- BOTON NUEVO -->
        <button id="btnNuevoSlider" type="button" class="btn btn-success mt-4 mb-4" data-toggle="modal">Nuevo</button> 

        <!-- Modal -->
        <div class="modal fade" id="modalSlider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!--FORMULARIO DE IMAGEN DE SLIDER-->
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

                        <!--FORMULARIO DE DATOS DE SLIDER-->
                        <div class="row">
                            <div class="col">
                                <form id="formSlider" >    
                                    <div class="form-group row">
                                        <div class="col">
                                            <label for="titulo-sld" class="col-form-label">Titulo</label>
                                            <input type="text" class="form-control" id="titulo-sld" required>
                                        </div>

                                        <div class="col">
                                            <label for="enlace-sld" class="col-form-label">Enlace</label>
                                            <input type="text" class="form-control" id="enlace-sld" required>
                                        </div>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="descrip-sld" class="form-label">Descripcion del Slider</label>
                                        <textarea class="form-control" id="descrip-sld" rows="2" required></textarea>
                                    </div> 
                                        
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" id="btnCancelarSlider">Cancelar</button>
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
                            <table id="tablaSlider" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Id</th>
                                    <th>Imagen Slider</th>
                                    <th>Titulo</th> 
                                    <th>Descripcion</th>
                                    <th>Enlace</th>                                
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                            
                                foreach($dataSld as $dat) {                                                        
                                ?>
                                <tr>
                                    <td><?php echo $dat['id_slider'] ?></td><!--id-->

                                    <td><img  width="300px" height="100px" src="images/<?php echo $dat['img_sld'] ?>">
                                    <span style="display:none;"><?php echo $dat['img_sld'] ?></span>
                                    </td> <!--imagen-->
                                    <td><?php echo $dat['titulo_sld'] ?></td><!--titulo-->
                                    <td><?php echo $dat['descrip_sld'] ?></td><!--descripcion-->
                                    <td><?php echo $dat['enlace_sld'] ?></td><!--enlace-->
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
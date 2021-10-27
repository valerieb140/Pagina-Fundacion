<?php
    session_start();

    if($_SESSION["s_usuario"] === null){
        header("Location: ../index.php");
    }

    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT id_noticia, titulo_not, contenido_not, fecha_not, img_not, descrip_not FROM noticia"; //NOTICIAS
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<?php include 'partes/head.php';?>

<body>
    <!--MENU PRINCIPAL-->
    <?php include 'partes/menu-principal.php';?>

    <!--CONTENIDO-->
    <div class="container">
        <h1 class="border-bottom text-secondary">AREA DE NOTICIAS</h1>

        <!-- bOTON NUEVO -->
        <button id="btnNuevoNoticia" type="button" class="btn btn-success mb-4 mt-4" data-toggle="modal">Nuevo</button> 

        <!-- Modal -->
        <div class="modal fade" id="modalNoticia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                    <div class="modal-body">
                        <!--FORMULARIO DE IMAGEN DE NOTICIA-->
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

                        <!--FORMULARIO DE DATOS DE NOTICIA-->
                        <div class="row">
                            <div class="col">
                                <form id="formNoticia" >    
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="form-group">
                                                    <label for="titulo-not" class="col-form-label">Titulo</label><!--nombre-->
                                                    <input type="text" class="form-control" id="titulo-not" required>
                                                </div>
                                            </div>    

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="fecha-not" class="col-form-label">Fecha</label><!--edad-->
                                                    <!--<input type="number" class="form-control" id="edad">-->
                                                    <input class="form-control" type="text" id="fecha-not" placeholder="" aria-label="Disabled input example" value="<?php echo date("d") . "-" . date("m") . "-" . date("Y") ;?>" disabled>
                                                </div>   
                                            </div>   
                                        </div>

                                        <div class="form-group">
                                        <label for="contenido-not" class="col-form-label">Contenido</label><!--nombre-->
                                        <!--<input type="text" class="form-control" id="otro">-->
                                        <textarea class="form-control" id="contenido-not" rows="3" required></textarea>
                                        </div>   

                                        <div class="form-group">
                                        <label for="descrip-not" class="col-form-label">Descripcion pequeña de la Noticia <br><small>max. 150 caracteres<small></label><!--nombre-->
                                        <!--<input type="text" class="form-control" id="otro">-->
                                        <textarea class="form-control" id="descrip-not" rows="2" maxlength="150" required></textarea>
                                        </div>   
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" id="btnCancelarNoticia">Cancelar</button>
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
                            <table id="tablaNoticia" class="table table-striped table-bordered table-condensed mb-5" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Id</th>
                                    <th>Titulo Noticia</th>
                                    <th>Publicacion</th> 
                                    <th>Contenido</th>
                                    <th>Pequeña Descripción</th>
                                    <th>Imagen</th>                                
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                            
                                foreach($data as $dat) {                                                        
                                ?>
                                <tr>
                                    <td><?php echo $dat['id_noticia'] ?></td><!--id-->

                                    <td><?php echo $dat['titulo_not'] ?></td><!--titulo-->
                                    <td><?php echo $dat['fecha_not'] ?></td><!--fecha-->
                                    <td><?php echo $dat['contenido_not'] ?></td><!--contenido-->
                                    <td><?php echo $dat['descrip_not'] ?></td><!--descripcion-->
                                    <td><img  width="300px" height="100px" src="images/<?php echo $dat['img_not'] ?>">
                                    <span style="display:none;"><?php echo $dat['img_not'] ?></span>
                                    </td> <!--imagen-->
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
                        <i class="fa fa-reply"></i> 
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

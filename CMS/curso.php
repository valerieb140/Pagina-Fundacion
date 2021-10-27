<?php
    session_start();

    if($_SESSION["s_usuario"] === null){
        header("Location: ../index.php");
    }

    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();


    $consulta = "SELECT id_curso, nombre_cur, descrip_cur, inicio_cur, duracion_cur, horario_cur, img_cur FROM curso"; //CURSO
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $dataCur=$resultado->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<?php include 'partes/head.php';?>

<body>
    <!--MENU PRINCIPAL-->
    <?php include 'partes/menu-principal.php';?>

    <!--CONTENIDO-->
    <div class="container">
        <!--CABECERA-->
        <h1 class="border-bottom text-secondary">AREA DE SERVICIOS</h1>

        <!--///////////////////////////////////////////////////////////////////////////////     Seccion de CURSOS-->
        <h3 class="mt-5 bg-secondary p-2 text-light rounded">CURSOS</h3>

        <!--BOTON NUEVO-->
        <button id="btnNuevoCurso" type="button" class="btn btn-success mb-3 mt-2" data-toggle="modal">Nuevo</button> 

        <!-- Modal -->
        <div class="modal fade" id="modalCurso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                    <div class="modal-body">
                        <!--FORMULARIO DE IMAGEN DE CURSO-->
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

                        <!--FORMULARIO DE DATOS DE CURSO-->
                        <div class="row">
                            <div class="col">
                                <form id="formCurso" >    
                                <div class="form-group row">
                                            <div class="col">
                                                <label for="titulo-cur" class="col-form-label">Titulo</label>
                                                <input type="text" class="form-control" id="titulo-cur" required>
                                            </div>

                                            <div class="col">
                                                <label for="horario-cur" class="col-form-label">Horario</label>
                                                <input type="text" class="form-control" id="horario-cur" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col">
                                                <label for="duracion-cur" class="col-form-label">Duración</label>
                                                <input type="text" class="form-control" id="duracion-cur" required>
                                            </div>

                                            <div class="col">
                                                <label for="inicio-cur" class="col-form-label">Fecha de Inicio</label><br>
                                                <!--<input type="text" class="form-control" id="titulo-noticia">-->
                                                <input type="date" id="inicio-cur" name="inicio-cur" class="form-control"
                                                min="2021-01-01" max="2050-12-31" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="descrip-cur" class="form-label">Descripcion del curso</label>
                                            <textarea class="form-control" id="descrip-cur" rows="3" required></textarea>
                                        </div>  
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" id="btnCancelarCurso">Cancelar</button>
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
                            <table id="tablaCurso" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre Curso</th>
                                    <th>Descripcion</th> 
                                    <th>Fecha Inicio</th>
                                    <th>Duracion</th>    
                                    <th>Horario</th> 
                                    <th>Imagen</th>                              
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                            
                                foreach($dataCur as $dat) {                                                        
                                ?>
                                <tr>
                                    <td><?php echo $dat['id_curso'] ?></td><!--id-->

                                    <td><?php echo $dat['nombre_cur'] ?></td><!--titulo-->
                                    <td><?php echo $dat['descrip_cur'] ?></td><!--descripcion-->
                                    <td><?php echo $dat['inicio_cur'] ?></td><!--fecha de inicio-->
                                    <td><?php echo $dat['duracion_cur'] ?></td><!--duracion-->
                                    <td><?php echo $dat['horario_cur'] ?></td><!--horario-->
                                    <td><img  width="300px" height="100px" src="images/<?php echo $dat['img_cur'] ?>">
                                    <span style="display:none;"><?php echo $dat['img_cur'] ?></span>
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

    <!--FOOTER-->
    <?php include 'partes/footer.php';?>
</body>
</html>
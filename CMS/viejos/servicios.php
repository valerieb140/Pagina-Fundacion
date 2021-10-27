<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT id_curso, nombre_cur, descrip_cur, inicio_cur, duracion_cur, horario_cur, img_cur FROM curso"; //CURSO
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$dataCur=$resultado->fetchAll(PDO::FETCH_ASSOC);

$consulta = "SELECT id_taller, nombre_tal, descrip_tal, inicio_tal, duracion_tal, horario_tal, img_tal FROM taller"; //TALLER
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$dataTal=$resultado->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida de imágenes con jQuery y Ajax Demo</title>
    <meta name="description" content="Subida de imágenes con jQuery y Ajax.."/>
    <meta name="author" content="Jose Aguilar">
    <!--<link rel="shortcut icon" href="https://www.jose-aguilar.com/blog/wp-content/themes/jaconsulting/favicon.ico" />-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">  


    <!--CSS Y JS BOOTSTRAP ACTUALIZADO-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


    <!--Scrip de DATATABLES-->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <!--Scrip de MI JS-->
    <script type="text/javascript" src="main.js"></script>  


    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    /*(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()*/


    </script>

</head>

<body>
<!--MENU PRINCIPAL-->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="https://www.jose-aguilar.com/">
        <img src="https://www.jose-aguilar.com/blog/wp-content/themes/jaconsulting/images/jose-aguilar.png" width="30" height="30" alt="Jose Aguilar">
      </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="http://localhost/upload-pruebas-respaldo18-06-2021/">Noticias <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="http://localhost/upload-pruebas-respaldo18-06-2021/servicios.php">Servicios</a>
            <a class="nav-item nav-link" href="http://localhost/upload-pruebas-respaldo18-06-2021/slider.php">Slider</a>
            <a class="nav-item nav-link" href="http://localhost/upload-pruebas-respaldo18-06-2021/galeria.php">Galeria</a>
        </div>
    </div>
</nav>


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
                                            <input type="text" class="form-control" id="titulo-cur">
                                        </div>

                                        <div class="col">
                                            <label for="horario-cur" class="col-form-label">Horario</label>
                                            <input type="text" class="form-control" id="horario-cur">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col">
                                            <label for="duracion-cur" class="col-form-label">Duración</label>
                                            <input type="text" class="form-control" id="duracion-cur">
                                        </div>

                                        <div class="col">
                                            <label for="inicio-cur" class="col-form-label">Fecha de Inicio</label><br>
                                            <!--<input type="text" class="form-control" id="titulo-noticia">-->
                                            <input type="date" id="inicio-cur" name="inicio-cur" class="form-control"
                                            min="2021-01-01" max="2050-12-31">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="descrip-cur" class="form-label">Descripcion del curso</label>
                                        <textarea class="form-control" id="descrip-cur" rows="3"></textarea>
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


    <!--///////////////////////////////////////////////////////////////////////////////    Seccion de TALLER-->
    <h3 class="mt-5 bg-secondary p-2 text-light rounded">TALLERES</h3>

    <!--BOTON NUEVO-->
    <button id="btnNuevoTaller" type="button" class="btn btn-success mb-3 mt-2" data-toggle="modal">Nuevo</button> 

    <!-- Modal -->
    <div class="modal fade" id="modalTaller" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                <div class="modal-body">
                    <!--FORMULARIO DE IMAGEN DE TALLER-->
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

                    <!--FORMULARIO DE DATOS DE TALLER-->
                    <div class="row">
                        <div class="col">
                            <form id="formTaller" >    
                            <div class="form-group row">
                                        <div class="col">
                                            <label for="titulo-tal" class="col-form-label">Titulo</label>
                                            <input type="text" class="form-control" id="titulo-tal">
                                        </div>

                                        <div class="col">
                                            <label for="horario-tal" class="col-form-label">Horario</label>
                                            <input type="text" class="form-control" id="horario-tal">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col">
                                            <label for="duracion-tal" class="col-form-label">Duración</label>
                                            <input type="text" class="form-control" id="duracion-tal">
                                        </div>

                                        <div class="col">
                                            <label for="inicio-tal" class="col-form-label">Fecha de Inicio</label><br>
                                            <!--<input type="text" class="form-control" id="titulo-noticia">-->
                                            <input type="date" id="inicio-tal" name="inicio-tal" class="form-control"
                                            min="2021-01-01" max="2050-12-31">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="descrip-tal" class="form-label">Descripcion del taller</label>
                                        <textarea class="form-control" id="descrip-tal" rows="3"></textarea>
                                    </div>  
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" id="btnCancelarTaller">Cancelar</button>
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
                        <table id="tablaTaller" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nombre Taller</th>
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
                            foreach($dataTal as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id_taller'] ?></td><!--id-->

                                <td><?php echo $dat['nombre_tal'] ?></td><!--titulo-->
                                <td><?php echo $dat['descrip_tal'] ?></td><!--descripcion-->
                                <td><?php echo $dat['inicio_tal'] ?></td><!--fecha de inicio-->
                                <td><?php echo $dat['duracion_tal'] ?></td><!--duracion-->
                                <td><?php echo $dat['horario_tal'] ?></td><!--horario-->
                                <td><img  width="300px" height="100px" src="images/<?php echo $dat['img_tal'] ?>">
                                <span style=""><?php echo $dat['img_tal'] ?></span>
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

<footer class="footer bg-dark">
    <div class="container">
        <span class="text-muted"><a href="https://www.jose-aguilar.com/">&copy; Valerie Baez</a></span>
    </div>
</footer>





</body>
</html>
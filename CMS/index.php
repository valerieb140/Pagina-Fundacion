<?php
    session_start();

    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    //recepción de datos enviados mediante POST desde ajax
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $password = (isset($_POST['password'])) ? $_POST['password'] : '';

    $pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD

    $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$pass' ";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();

    if($resultado->rowCount() >= 1){
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["s_usuario"] = $usuario;
        header ("Location: noticia.php");
    }else{
        $_SESSION["s_usuario"] = null;
        $data=null;
    }

    $conexion=null;

    //usuarios de pruebaen la base de datos
    //usuario:admin pass:12345
    //usuario:demo pass:demo
?>

<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login CMS</title>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">        

        <!--CSS Y JS BOOTSTRAP ACTUALIZADO-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>    
    </head>
    
    <body class="body-lg">
     <div id="login">   
         <h3 class="text-center text-white display-4 mt-4">Login CMS</h3>         
         <div class="container">
             <div id="login-row" class="row justify-content-center align-items-center">
                 <div id="login-column" class="col-md-6">
                     
                     <div id="login-box" class="col-md-12 bg-light text-dark">

                         <form id="formLogin" class="form" action="" method="post">
                            <div class="pt-2"> 
                                <img src="images/user.png" alt="" class="rounded mx-auto d-block" width="100" height="100">
                            </div>
                             
                             <h3 class="text-center text-dark">Iniciar Sesión</h3>
                             <div class="form-group">
                                 <label for="usuario" class="text-dark">Usuario</label>
                                 <input type="text" name="usuario" id="usuario" class="form-control">
                             </div>
                             <div class="form-group">
                                 <label for="password" class="text-dark">Password</label>
                                 <input type="password" name="password" id="password" class="form-control">
                             </div>
                             
                             <div class="form-gropu text-center mt-5">
                                 <input type="submit" name="submit" class="btn btn-dark btn-lg btn-block" value="Conectar">
                             </div>
                         </form>

                     </div>
                     
                 </div>
             </div>
         </div>         
     </div>       
  
     <script src="jquery/jquery-3.3.1.min.js"></script>    
     <script src="bootstrap/js/bootstrap.min.js"></script>    
     <script src="popper/popper.min.js"></script>    
        
     <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>    
     <!--<script src="codigo.js"></script>    -->
    </body>
</html>
<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

/*
Direccion de API: 
http://localhost/Fundacion-main/api/{variable}

{variable} puede ser: noticia , taller , curso , slider , galeria
*/

require_once "../controllers/controlador.php";
require_once "../models/modelo.php";


$peticion = $_GET['variable'];

if ($peticion == 'noticia' || 
    $peticion == 'taller' || 
    $peticion == 'curso' || 
    $peticion == 'slider' || 
    $peticion == 'galeria') {

  $mvc= new mvccontroller();
  $respuesta = $mvc-> apiController($peticion);
  
  echo json_encode($respuesta);
    
} else {

  $respuesta = 'Lo sentimos, su peticion no es valida.';
  echo $respuesta;

}


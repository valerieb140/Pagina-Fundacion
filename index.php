
<?php

require_once "controllers/controlador.php";
require_once "models/modelo.php";
include_once 'bd/conexion.php';

$mvc= new mvccontroller();
$mvc-> plantilla();

?>
<?php

include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   
//GLOBALES
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$imagen = (isset($_POST['imagen'])) ? $_POST['imagen'] : '';

//RECEPCION DE NOTICIA
$tituloNot = (isset($_POST['tituloNoticia'])) ? $_POST['tituloNoticia'] : '';
$fechaNot = (isset($_POST['fechaNoticia'])) ? $_POST['fechaNoticia'] : '';
$contenidoNot = (isset($_POST['contenidoNoticia'])) ? $_POST['contenidoNoticia'] : '';
$descripNot = (isset($_POST['descripNoticia'])) ? $_POST['descripNoticia'] : '';

//RECEPCION DE CURSO
$nombreCur = (isset($_POST['tituloCur'])) ? $_POST['tituloCur'] : '';      
$descripCur = (isset($_POST['descripCur'])) ? $_POST['descripCur'] : '';
$inicioCur = (isset($_POST['inicioCur'])) ? $_POST['inicioCur'] : '';
$duracionCur = (isset($_POST['duracCur'])) ? $_POST['duracCur'] : '';
$horarioCur = (isset($_POST['horarioCur'])) ? $_POST['horarioCur'] : '';


//RECEPCION DE TALLER
$nombreTal = (isset($_POST['tituloTal'])) ? $_POST['tituloTal'] : '';      
$descripTal = (isset($_POST['descripTal'])) ? $_POST['descripTal'] : '';
$inicioTal = (isset($_POST['inicioTal'])) ? $_POST['inicioTal'] : '';
$duracionTal = (isset($_POST['duracTal'])) ? $_POST['duracTal'] : '';
$horarioTal = (isset($_POST['horarioTal'])) ? $_POST['horarioTal'] : '';

//RECEPCION DE SLIDER
$tituloSld = (isset($_POST['tituloSld'])) ? $_POST['tituloSld'] : '';
$enlaceSld = (isset($_POST['enlaceSld'])) ? $_POST['enlaceSld'] : '';
$descripSld = (isset($_POST['descripSld'])) ? $_POST['descripSld'] : '';

//RECEPCION DE GALERIA
$tituloGal = (isset($_POST['tituloGal'])) ? $_POST['tituloGal'] : '';



switch($opcion){
    case 1: //Insertar NOTICIA
        $consulta = "INSERT INTO noticia (titulo_not, contenido_not, fecha_not, img_not, descrip_not) VALUES('$tituloNot', '$contenidoNot', '$fechaNot', '$imagen', '$descripNot') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id_noticia, titulo_not, contenido_not, fecha_not, img_not, descrip_not FROM noticia ORDER BY id_noticia DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación NOTICIA
        $consulta = "UPDATE noticia SET titulo_not='$tituloNot', contenido_not='$contenidoNot', fecha_not='$fechaNot', img_not='$imagen', descrip_not='$descripNot' WHERE id_noticia='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id_noticia, titulo_not, contenido_not, fecha_not, img_not, descrip_not FROM noticia WHERE id_noticia='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://eliminar NOTICIA
        $consulta = "DELETE FROM noticia WHERE id_noticia='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break; 
    case 4: //insertar CURSO
        $consulta = "INSERT INTO curso (nombre_cur, descrip_cur, inicio_cur, duracion_cur, horario_cur, img_cur) VALUES('$nombreCur', '$descripCur', '$inicioCur', '$duracionCur', '$horarioCur', '$imagen') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
    
        $consulta = "SELECT id_curso,nombre_cur, descrip_cur, inicio_cur, duracion_cur, horario_cur, img_cur FROM curso ORDER BY id_curso DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;  
        
    case 5: //modificar CURSO
        $consulta = "UPDATE curso SET nombre_cur='$nombreCur', descrip_cur='$descripCur', inicio_cur='$inicioCur', duracion_cur='$duracionCur', horario_cur='$horarioCur', img_cur='$imagen' WHERE id_curso='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id_curso,nombre_cur, descrip_cur, inicio_cur, duracion_cur, horario_cur, img_cur FROM curso WHERE id_curso='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;   

    case 6://eliminar CURSO
        $consulta = "DELETE FROM curso WHERE id_curso='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break; 

    case 7: //insertar TALLER
        $consulta = "INSERT INTO taller (nombre_tal, descrip_tal, inicio_tal, duracion_tal, horario_tal, img_tal) VALUES('$nombreTal', '$descripTal', '$inicioTal', '$duracionTal', '$horarioTal', '$imagen') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
    
        $consulta = "SELECT id_taller,nombre_tal, descrip_tal, inicio_tal, duracion_tal, horario_tal, img_tal FROM taller ORDER BY id_taller DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;  
    case 8: //modificar TALLER
        $consulta = "UPDATE taller SET nombre_tal='$nombreTal', descrip_tal='$descripTal', inicio_tal='$inicioTal', duracion_tal='$duracionTal', horario_tal='$horarioTal', img_tal='$imagen' WHERE id_taller='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id_taller, nombre_tal, descrip_tal, inicio_tal, duracion_tal, horario_tal, img_tal FROM taller WHERE id_taller='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;   

    case 9://eliminar TALLER
        $consulta = "DELETE FROM taller WHERE id_taller='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break; 

    case 10: //Insertar SLIDER
        $consulta = "INSERT INTO slider (img_sld, titulo_sld, descrip_sld, enlace_sld) VALUES('$imagen', '$tituloSld', '$descripSld', '$enlaceSld') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id_slider, img_sld, titulo_sld, descrip_sld, enlace_sld FROM slider ORDER BY id_slider DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 11: //modificación SLIDER
        $consulta = "UPDATE slider SET img_sld='$imagen', titulo_sld='$tituloSld', descrip_sld='$descripSld', enlace_sld='$enlaceSld' WHERE id_slider='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id_slider, img_sld, titulo_sld, descrip_sld, enlace_sld FROM slider WHERE id_slider='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;     

    case 12://eliminar SLIDER
        $consulta = "DELETE FROM slider WHERE id_slider='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;

    case 13: //Insertar GALERIA
        $consulta = "INSERT INTO galeria (img_gal, tit_img_gal) VALUES('$imagen', '$tituloGal') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id_galeria, img_gal, tit_img_gal FROM galeria ORDER BY id_galeria DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 14: //modificación GALERIA
        $consulta = "UPDATE galeria SET img_gal='$imagen', tit_img_gal='$tituloGal' WHERE id_galeria='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id_galeria, img_gal, tit_img_gal FROM galeria WHERE id_galeria='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;     

    case 15://eliminar GALERIA
        $consulta = "DELETE FROM galeria WHERE id_galeria='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break; 

}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;



